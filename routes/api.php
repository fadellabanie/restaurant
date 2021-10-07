<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MealController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\TableController;
use App\Http\Controllers\Api\V1\ReservationController;
use App\Http\Controllers\Api\V1\ConstantController;

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


Route::group(['prefix' => 'v1'], function () {
    ## Constant
    Route::get('customers', [ConstantController::class, 'customer']);

    Route::post('check-available-table', [ReservationController::class, 'checkAvailable']);
    Route::post('reservation-table', [ReservationController::class, 'reservation']);
    Route::post('reservation', [ReservationController::class, 'show']);

    Route::get('meals', [MealController::class, 'list']);
    Route::post('make-order', [OrderController::class, 'make']);

    Route::get('checkout', [TableController::class, 'checkout']);
    Route::post('print', [TableController::class, 'print']);
});
