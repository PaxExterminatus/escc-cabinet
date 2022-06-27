<?php

use App\Http\Controllers\API\PaymentsProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

//todo not working with sanctum
//Route::middleware('auth:sanctum')->group(function () {
//    Route::get('/user', [AuthenticatedSessionController::class, 'user']);
//    Route::post('/payment/pay', [PaymentsProviderController::class, 'pay']);
//});
