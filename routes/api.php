<?php

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



Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login']);
    Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:api'], function() {
        Route::delete('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
        Route::get('user', [App\Http\Controllers\API\AuthController::class, 'user']);
    });
});
