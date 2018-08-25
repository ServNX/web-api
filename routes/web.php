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

/**
 * Socialite Routes
 */
Route::get('auth/github', 'Auth\GithubController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\GithubController@handleProviderCallback');
