<?php

namespace App\Domain\Payments\Controllers;

use App\Domain\Payments\Provider\PaymentProvider;
use App\Models\User;
use App\Http\Controllers\APIController;
use App\Repository\Payments\UserPaymentsSiteQuery;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;

class PaymentsController extends APIController
{
    protected Authenticatable|User|null $user;
    protected PaymentProvider $provider;

    function __construct(PaymentProvider $provider)
    {
        $this->provider = $provider;

        $this->middleware(function ($request, $next) {
            $this->user = User::whereId(auth()->id())->first();
            return $next($request);
        });
    }

    /**
     * List of site auth payment
     * @return JsonResponse
     */
    function site(): JsonResponse
    {
        $user_id = $this->user->id;
        $client_id = (int)$this->user->code;

        $payments = UserPaymentsSiteQuery::make()
            ->setUserId($user_id)
            ->setClientId($client_id)
            ->get();

        foreach ($payments as $payment)
        {
            if ($payment->bill_status <= 1 && $payment->bill_id)
            {
                $data = $this->provider->getInvoiceStatus($payment->bill_id);

                if ($data->purchase && $payment->bill_status !== $data->purchase)
                {
                    $payment->bill_status = $data->purchase;
                    $payment->save();
                }
            }
        }

        return $this->success(
            data: [
                'payments' => $payments,
                'user_id' => $user_id,
                'client_id' => $client_id,
            ],
        );
    }

    /**
     * List of sass payments
     * @return JsonResponse
     */
    function all(): JsonResponse
    {
        return $this->success(
            data: [
                'payments' => []
            ],
        );
    }
}
