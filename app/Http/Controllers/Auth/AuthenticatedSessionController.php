<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\APIController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Repository\Client\ClientRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends APIController
{
    protected ClientRepository $clients;

    function __construct(ClientRepository $client)
    {
        $this->clients = $client;
    }

    function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return $this->success(
            data: [
                'user' => Auth::user(),
            ],
            redirect: '/'
        );
    }

    function destroy(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->success(
            message: 'You are logout'
        );
    }

    function user(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        $data = [
            'user' => $user,
        ];

        $clientCode = (int)$user->code;

        if ($clientCode)
        {
            $client = $this->clients->find((int)$user->code);
            $data['client'] = $client;
        }

        return $this->success(
            data: $data,
        );
    }
}
