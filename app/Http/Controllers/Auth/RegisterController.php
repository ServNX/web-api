<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function register(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);

        if($this->user->model()->whereEmail($data['email'])->first() !== null) {
            return response(['message' => 'User already exists'], 409);
        }

        return response(new UserResource($this->user->create($data)), 201);

    }
}