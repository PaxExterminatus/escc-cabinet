<?php

namespace App\Domain\Payments\Controllers;

use App\Domain\Payments\Provider\PaymentProvider;
use App\Http\Controllers\APIController;
use App\Models\Payment;
use App\Models\User;
use App\Repository\Payments\UserPaymentInterface;
use App\Repository\Payments\UserPaymentsSiteQuery;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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
            if ($payment->bill_status < 5 && $payment->bill_id)
            {
                $data = $this->provider->getInvoice($payment->bill_id);

                if ($data->bill && $payment->bill_status !== $data->bill->statusEnum)
                {
                    $payment->bill_status = $data->bill->statusEnum;
                }
                else
                {
                    //$payment->bill_status = $data->status;
                }
                $payment->save();
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
