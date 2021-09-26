<?php

use App\Http\Controllers\SPA\SPAController;

use App\Http\Controllers\WEB\PaymentController;
use Illuminate\Support\Facades\Route;

// Public SPA ----------------------------------------------------------------------------------------------------------

Route::prefix('/auth/')->middleware('guest')->group(function () {
    Route::get('login', SPAController::class)->name('login');
});

// Protected SPA -------------------------------------------------------------------------------------------------------

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', SPAController::class)->name('home');

    Route::get('/payments', [PaymentController::class, 'dashboard']);
    Route::get('/payments/all', [PaymentController::class, 'all']);
    Route::get('/payments/pay', [PaymentController::class, 'pay']);
});

require __DIR__.'/auth.php';
