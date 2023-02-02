<?php

namespace App\Domain\Payments\Controllers;

use App\Domain\Payments\Provider\PaymentProvider;
use App\Http\Controllers\APIController;
use App\Models\Payment;
use App\Models\User;
use App\Repository\Payments\UserPaymentInterface;
use App\Repository\Payments\UserPaymentsSiteDatabase;
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

        /**
         * @var UserPaymentInterface[] $payments
         */
        $payments = UserPaymentsSiteDatabase::make()
            ->user_id->set($user_id)
            ->client_id->set($client_id)
            ->query()
            ->get();

        foreach ($payments as $payment)
        {
            if ($payment->status === 0 && $payment->bill_id)
            {
                Log::info($payment->bill_id);
                $data = $this->provider->getInvoice($payment->bill_id);
                Log::info(json_encode($data));
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
