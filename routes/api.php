<?php

use App\Http\Api\ArticleController;
use App\Http\Api\StatisticController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('like', [StatisticController::class, 'like']);
Route::post('view', [StatisticController::class, 'view']);
Route::post('comment', [ArticleController::class, 'comment']);
