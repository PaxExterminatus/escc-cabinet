<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use App\Models\Payment;
use App\Models\User;
use App\Repository\Payments\PaymentsSite;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;

class PaymentsController extends APIController
{
    protected Authenticatable|User|null $user;

    function __construct()
    {
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
        $payments = PaymentsSite::make()
            ->setUserId($this->user->id)
            ->setClientId($this->user->code)
            ->query()
            ->get();

        return $this->success(
            data: [
                'payments' => $payments,
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
