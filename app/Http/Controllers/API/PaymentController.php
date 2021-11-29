<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Payments\Callback\PaymentsCallbackRequest;
use App\Http\Requests\Payments\Pay\PaymentsPayRequest;
use App\Models\Payment;
use App\Models\User;
use App\Services\Hutkigrosh\Bill;
use App\Services\Hutkigrosh\HutkigroshClient;
use App\Services\Hutkigrosh\HutkigroshEndpoint;
use Illuminate\Http\JsonResponse;

class PaymentController
{
    private HutkigroshClient $client;

    public function __construct(HutkigroshClient $client)
    {
        $this->client = $client;
    }

    /**
     * Here the client makes payment.
     * @param PaymentsPayRequest $request
     * @return JsonResponse
     */
    function pay(PaymentsPayRequest $request): JsonResponse
    {
        /** @var User $user */

        $params = $request->params();
        $user = $request->user();

        if ($params->code) {
            $payment = Payment::create([
                'client_id' => $params->code,
                'code' =>  (int)substr($params->code.microtime(true), 0, 30),
                'iname' => $params->name ?? '',
                'fname' => $params->surname ?? '',
                'phone' => $params->phone ?? 'none',
                'email' => $params->email,
                'price_total' => $params->amount,
            ]);
        }
        elseif ($user) {
            $payment = Payment::create([
                'user_id' => $user->id,
                'code' =>  (int)substr($user->id.microtime(true), 0, 30),
                'iname' => $user->iname,
                'fname' => $user->fname,
                'phone' => $user->phone ?? 'none',
                'email' => $user->email,
                'price_total' => $params->amount,
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $bill = new Bill($payment);
        $billResponse = $this->client->makeBill($bill);

        if (!$billResponse->ok())
        {
            return response()->json([
                'success' => false,
                'message' => 'The payment system was unable to process the invoice.'
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
                    'message' => 'The payment system was unable to process the invoice.'
                ], 500);
            }
        }

        return response()->json([
            'success' => true,
            'goto' => HutkigroshEndpoint::webPayPay($billID),
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
