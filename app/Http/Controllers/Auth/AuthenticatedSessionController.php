<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends ApiController
{
    function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return $this->success(
            data: [
                'user' => Auth::user(),
            ],
            redirect: route('home')
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
        return $this->success(
            data: [
                'user' => $request->user(),
            ]
        );
    }
}
