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

Route::middleware('auth:api')->group(function () {
    Route::get('verify', 'Auth\AuthController@verify');
    Route::get('logout', 'Auth\AuthController@logout');

    // Temporary for testing
    Route::get('/users', function () {
        return response(\App\User::all(), 200);
    });
});
