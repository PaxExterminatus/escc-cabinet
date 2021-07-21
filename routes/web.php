<?php

use App\Http\Controllers\SPA\SPAController;

use Illuminate\Support\Facades\Route;

// Public SPA ----------------------------------------------------------------------------------------------------------

Route::prefix('/auth/')->group(function () {
    Route::get('signin', SPAController::class)->name('login');
});

// Protected SPA -------------------------------------------------------------------------------------------------------

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', SPAController::class)->name('home');
});

require __DIR__.'/auth.php';
