<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response(['message' => 'success'], 200);
        }

        return response(['message' => 'Unauthorized'], 401);
    }

    public function verify()
    {
        // Doesn't appear to be using session based login, likely do to different origins
        $guest = Auth::guest();
        $status = $guest ? 401 : 200;
        $message = $guest ? 'Unauthorized' : 'success';

        return response(['message' => $message], $status);
    }
}