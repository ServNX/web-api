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

    // AuthController
    Route::post('login', 'AuthController@authenticate');
    Route::post('register', 'AuthController@register');

    /**
     * Services Routes
     */
    Route::get('auth/github', 'GithubController@redirectToProvider');
    Route::get('auth/github/callback', 'GithubController@handleProviderCallback');

});
