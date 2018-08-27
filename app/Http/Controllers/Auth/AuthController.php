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
            return response(['message' => 'success'], 200);
        }

        return response(['message' => 'Unauthorized'], 401);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function verify()
    {
        // Doesn't appear to be using session based login, likely do to different origins
        $guest = Auth::guest();
        $status = $guest ? 401 : 200;
        $message = $guest ? 'Unauthorized' : 'success';

        return response(['message' => $message], $status);
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

        return response(new UserResource($this->user->create($data)), 201);

    }

    public function logout()
    {
        $this->user->model()
            ->tokens
            ->each(function ($key, $token) {
                $token->delete();
            });

        return response(['message' => 'success'], 200);
    }
}
