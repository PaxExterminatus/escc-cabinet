<?php

use App\Http\Controllers\API\AudioController;
use App\Http\Controllers\API\VideoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SPA\SPAController;
use App\Domain\Payments\Controllers\PaymentsController;
use App\Domain\Payments\Controllers\PayController;

use App\Services\Routes;
use Illuminate\Support\Facades\Route;

// Public SPA ----------------------------------------------------------------------------------------------------------

Route::prefix('/auth/')->middleware('guest')->group(function () {
    Route::get('login', SPAController::class)->name('login');
});

Route::get('/pay/{any?}', SPAController::class)->where('any', '(.*)');

Route::prefix('/api/')->group(function () {
    Route::post('payment/pay', [PayController::class, 'pay']);
});

// Protected SPA -------------------------------------------------------------------------------------------------------

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/', SPAController::class)->name('home');
    Route::get('/courses', SPAController::class)->name('courses');
    Route::get('/course/{any}', SPAController::class)->name('course');
    Route::get('/profile', SPAController::class)->name('profile');
    Route::get('/payments', SPAController::class)->name('payments');
    Route::get('/payments/all', SPAController::class)->name('payments');

    Route::prefix('/api/')->group(function () {
        Route::get('user', [AuthenticatedSessionController::class, 'user']);

        Route::controller(AudioController::class)->prefix('audio/')->group(function () {
            Route::get('{course}/{lesson}', 'index');

            Route::get('play/course/{course}/lesson/{lesson}/name/{name}/extension/{extension}', 'play')
                ->name(Routes::API_AUDIO_PLAY_LESSON_BY_NAME);

            Route::get('download/course/{course}/lesson/{lesson}', 'download')
                ->name(Routes::API_AUDIO_DOWNLOAD_LESSON_AUDIO);
        });

        Route::controller(VideoController::class)->prefix('video/')->group(function () {
            Route::get('{course}', 'index');
            Route::get('play/course/{course}/name/{name}', 'play')->name('play_course_video_by_name');
        });

        Route::controller(PaymentsController::class)->prefix('payments/')->group(function () {
            Route::get('site', 'site');
            Route::get('all', 'all');
        });
    });
});

require __DIR__.'/auth.php';
