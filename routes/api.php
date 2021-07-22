<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [AuthenticatedSessionController::class, 'user']);
});
