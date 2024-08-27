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
Route::get('/fetch', [FeedbackController::class, 'fetchFeedbacks']);
Route::get('/feedbacks/{feedback}', [FeedbackController::class, 'fetchSingleFeedback']);
Route::put('/feedbacks/{feedback}/update', [FeedbackController::class, 'updateFeedbackStatus']);
