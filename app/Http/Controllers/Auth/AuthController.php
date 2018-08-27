<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $user;

    /**
     * AuthController constructor.
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

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
            $token = Auth::user()->createToken('Login')->accessToken;
            return response([
                'user' => new UserResource(Auth::user()),
                'access_token' => $token,
            ], 200);
        }

        return response(['message' => 'Unauthorized'], 401);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function verify()
    {
        return response(['message' => 'success'], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);

        if ($this->user->model()->whereEmail($data['email'])->first() !== null) {
            return response(['message' => 'User already exists'], 409);
        }

        $user = $this->user->create($data);
        $token = $user->createToken('Register')->accessToken;

        return response([
            'user' => new UserResource($user),
            'access_token' => $token,
        ], 201);

    }

    public function logout()
    {
        Auth::user()
            ->tokens
            ->each(function ($token, $key) {
                $token->delete();
            });

        return response(['message' => 'success'], 200);
    }
}
