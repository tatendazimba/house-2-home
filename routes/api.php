<?php

use Illuminate\Http\Request;

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
Route::apiResource("orders", OrderController::class);

Route::post("order/capture", "OrderController@capture")->name("order.capture");

Route::post('/email', SendEmailController::class);
Route::get('/shipping', ShippingController::class);
Route::post('/logger', LoggerController::class);
