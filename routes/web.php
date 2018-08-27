<?php

Route::get('/', function () {
    return "
        <pre>   
           _____                         _   _  __   __        _        _         _____ 
          / ____|                       | \ | | \ \ / /       | |      | |       / ____|
         | (___     ___   _ __  __   __ |  \| |  \ V /        | |      | |      | |     
          \___ \   / _ \ | '__| \ \ / / | . ` |   > <         | |      | |      | |     
          ____) | |  __/ | |     \ V /  | |\  |  / . \   _    | |____  | |____  | |____ 
         |_____/   \___| |_|      \_/   |_| \_| /_/ \_\ ( )   |______| |______|  \_____|
                                                        |/                              
                                                                                API v1.0                                                                  
        </pre>
    ";
});

Route::namespace('Auth')->group(function () {

    // Login
    Route::post('login', 'LoginController@login');
    Route::get('verify', 'LoginController@verify');

    // Logout
    Route::get('logout', function () {
        \Auth::logout();
        return response(['message' =>  'success'], 200);
    });

    // Register
    Route::post('register', 'RegisterController@register');

    Route::middleware('auth')->group(function () {
        /**
         * Services Routes
         */
        Route::get('auth/github', 'GithubController@redirectToProvider');
        Route::get('auth/github/callback', 'GithubController@handleProviderCallback');
    });

});
