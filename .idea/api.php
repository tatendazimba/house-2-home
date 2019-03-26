<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("make", function(Request $request) {

//    dd($request->toArray());

    if (Mail::to(env("MAIL_RECIPIENT"))->send(new \App\Mail\RSVP($request)))
    {
        return "RSVP made.";
    } else
    {
      return Mail::failures();
    }

})->middleware(\App\Http\Middleware\CsvLogger::class);
