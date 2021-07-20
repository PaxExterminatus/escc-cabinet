<?php

use App\Http\Controllers\Web\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::post('login', [AuthController::class, 'login']);

// Protected -----------------------------------------------------------------------------------------------------------

Route::middleware('auth:sanctum')
    ->group(function () {

        Route::get('/', function () {
            return view('spa');
        })->name('home');

        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });

Route::prefix('/auth/')->group(function () {
    Route::get('signin', function () {
        return view('spa');
    })->name('login');
});



require __DIR__.'/auth.php';
