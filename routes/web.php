<?php

use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::get('/', function () {
    return view('spa');
});

Route::prefix('/auth/')->group(function () {
    Route::get('signin', function () {
        return view('spa');
    });
});
