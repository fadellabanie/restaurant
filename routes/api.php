<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MealController;
use App\Http\Controllers\Api\V1\TableController;
use App\Http\Controllers\Api\V1\ReservationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::post('check-available-table', [ReservationController::class, 'checkAvailable']);
    Route::post('reservation-table', [ReservationController::class, 'reservation']);

    Route::post('meals', [MealController::class, 'list']);

    Route::get('checkout', [TableController::class, 'checkout']);
});
