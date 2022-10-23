<?php

namespace App\Domain\Payments\Controllers;

use App\Http\Controllers\APIController;
use App\Http\Requests\Payments\Callback\PaymentsCallbackRequest;
use App\Domain\Payments\Requests\PayRequest;
use App\Models\Payment;
use App\Models\User;
use App\Domain\Payments\Provider\HutkiGrosh\Bill;
use App\Domain\Payments\Provider\HutkiGrosh\HutkiGroshClient;
use App\Domain\Payments\Provider\HutkiGrosh\HutkiGroshEndpoint;
use Illuminate\Http\JsonResponse;

class PayController extends APIController
{
    private HutkiGroshClient $client;

    function __construct(HutkiGroshClient $client)
    {
        $this->client = $client;
    }

    /**
     * Here the client makes payment.
     * @param PayRequest $request
     * @return JsonResponse
     */
    function pay(PayRequest $request): JsonResponse
    {
        /** @var User $user */

        $params = $request->params();
        $user = $request->user();

        if ($params->code)
        {
            $payment = Payment::query()->create([
                'client_id' => $params->code,
                'code' =>  (int)substr($params->code.microtime(true), 0, 30),
                'iname' => $params->name ?? '',
                'fname' => $params->surname ?? '',
                'phone' => $params->phone ?? 'none',
                'email' => $params->email,
                'price_total' => $params->amount,
            ]);
        }
        elseif ($user)
        {
            $payment = Payment::query()->create([
                'user_id' => $user->id,
                'code' =>  (int)substr($user->id.microtime(true), 0, 30),
                'iname' => $user->iname,
                'fname' => $user->fname,
                'phone' => $user->phone ?? 'none',
                'email' => $user->email,
                'price_total' => $params->amount,
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $bill = new Bill($payment);
        $billResponse = $this->client->makeBill($bill);

        if (!$billResponse || !$billResponse->ok())
        {
            return response()->json([
                'success' => false,
                'message' => 'Платежная система не смогла обработать платеж'
            ], 500);
        } else {
            $billData = $billResponse->json();
            $billID = $billData['billID'];
            $billStatus = $billData['status'];

            if ($billStatus === 0 && $billID) {
                $payment->bill_id = $billID;
                $payment->bill_status = $billData['status'];
                $payment->save();
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Платежная система не смогла обработать платеж'
                ], 500);
            }
        }

        return response()->json([
            'success' => true,
            'goto' => HutkiGroshEndpoint::webPayPay($billID),
            'payment' => $payment,
        ]);
    }

    /**
     * Webhook function to confirm payment.
     * @param PaymentsCallbackRequest $request
     * @return JsonResponse
     */
    function callback(PaymentsCallbackRequest $request): JsonResponse
    {
        $params = $request->params();

        return response()->json();
    }
}
