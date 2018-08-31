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
        $self = $this;
        $this->middleware(function ($request, $next) use ($self, $user) {
            if (!$request->has('uid') || !$request->has('service')) {
                return response([
                    'message' => 'Payload missing required parameters \'uid\' & \'service\''
                ], 400);
            }

            $self->user = $user;
            $self->init($request);
            return $next($request);
        });
    }

    /**
     * @param Request $request
     */
    protected function init(Request $request)
    {
        $user = $this->user->findById($request->uid);
        $this->model = $user->serviceModel($request->service);

        $this->driver = $this->model->driver;
        $this->username = $this->model->username;
        $this->token = $this->model->token;

        $this->service = $user->serviceInstance($this->driver);
        $this->service->authenticate($this->token);

    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function repositories()
    {
        $repos = $this->service->repositories($this->username);

        return response($repos, 200);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function issues($repo, $state = 'open')
    {
        $issues = $this->service->issues($this->username, $repo, $state);

        return response($issues, 200);
    }
}