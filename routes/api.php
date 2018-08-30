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

    /*
     * UsersController
     */
    Route::get('user/{id}', 'UsersController@show');

    /*
     * ServicesController
     */
    Route::get('user/{uid}/services/{service}/repositories', 'ServicesController@repositories');
    Route::get('user/{uid}/services/{service}/issues', 'ServicesController@issues');


});

/**
 * Services Routes
 */
Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::get('github', 'GithubController@redirectToProvider');
    Route::get('github/callback', 'GithubController@handleProviderCallback');
});