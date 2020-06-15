<?php

use Zttp\Zttp;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/weather', function () {
    $apikey = config('services.openweathermap.key');
    $lat = request('lat');
    $lng = request('lng');

    $response = Zttp::get("https://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lng&units=metric
    exclude=hourly,daily&appid=$apikey");

    return $response->json();
});
