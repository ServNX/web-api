<?php

namespace App\Http\Controllers;

use App\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function repositories($uid, $service)
    {
        $user = $this->user->model()->find($uid);
        $service = $user->services()->whereDriver($service)->first();
        $instance = $user->service($service->driver);

        return response($instance->repositories($service->username));
    }
}