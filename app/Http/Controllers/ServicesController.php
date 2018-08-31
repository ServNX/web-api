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

    /**
     * @var $service
     */
    private $service;

    /**
     * @var $model
     */
    private $model;

    /**
     * @var $username
     */
    private $username;

    /**
     * @var $driver
     */
    private $driver;

    /**
     * @var $token
     */
    private $token;


    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function repositories($uid, $service)
    {
        $this->setUp($uid, $service);
        return response($this->service->repositories($this->username));
    }

    protected function setUp($uid, $service)
    {
        $user = $this->user->findById($uid);

        $this->model = $user->serviceModel($service);

        $this->driver = $this->model->driver;
        $this->username = $this->model->username;
        $this->token = $this->model->token;

        $this->service = $user->serviceInstance($this->driver);
        $this->service->authenticate($this->token);

        return $this->service;
    }
}