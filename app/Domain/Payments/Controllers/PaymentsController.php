<?php

namespace App\Domain\Payments\Controllers;

use App\Http\Controllers\APIController;
use App\Models\Payment;
use App\Models\User;
use App\Repository\Payments\UserPaymentsSiteDatabase;
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
        $user_id = $this->user->id;
        $client_id = (int)$this->user->code;

        $payments = UserPaymentsSiteDatabase::make()
            ->user_id->set($user_id)
            ->client_id->set($client_id)
            ->query()
            ->get();

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
