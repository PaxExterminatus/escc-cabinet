<?php

use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SPA\SPAController;

use Illuminate\Support\Facades\Route;

// Public SPA ----------------------------------------------------------------------------------------------------------

Route::prefix('/auth/')->middleware('guest')->group(function () {
    Route::get('login', SPAController::class)->name('login');
});

Route::get('/pay/{any?}', SPAController::class)->where('any', '(.*)');

Route::prefix('/api/')->group(function () {
    Route::post('payment/pay', [PaymentController::class, 'pay']);
});

// Protected SPA -------------------------------------------------------------------------------------------------------

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', SPAController::class)->name('home');
    Route::get('/courses', SPAController::class)->name('courses');
    Route::get('/course/{any}', SPAController::class)->name('course');
    Route::get('/profile', SPAController::class)->name('profile');
    Route::get('/payments', SPAController::class)->name('payments');

    Route::prefix('/api/')->group(function () {
        Route::get('user', [AuthenticatedSessionController::class, 'user']);
    });
});

require __DIR__.'/auth.php';
