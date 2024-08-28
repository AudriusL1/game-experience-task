<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['token.auth', 'throttle:1,1'])->group(function () {
    Route::post('/feedback', [FeedbackController::class, 'store']);
});

Route::prefix('feedbacks')->group(function () {
    Route::get('/', [FeedbackController::class, 'fetchFeedbacks']);
    Route::get('/{feedback}', [FeedbackController::class, 'fetchSingleFeedback']);
    Route::put('/{feedback}/update', [FeedbackController::class, 'updateFeedbackStatus']);
});

