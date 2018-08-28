<?php

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

    Route::get('user/{id}', 'UsersController@show');

    /**
     * Services Routes
     */
    Route::get('auth/github', 'GithubController@redirectToProvider');
    Route::get('auth/github/callback', 'GithubController@handleProviderCallback');
});
