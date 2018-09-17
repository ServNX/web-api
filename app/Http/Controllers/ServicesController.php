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
            $self->validate($request, [
                'uid' => 'required',
                'service' => 'required'
            ]);

            $self->user = $user;
            $user = $self->user->findById($request->uid);
            $self->model = $user->serviceModel($request->service);

            if ($this->model === null) {
                return response(['message' => "Service '$request->service' not found!"], 404);
            }

            $self->driver = $self->model->driver;
            $self->username = $self->model->username;
            $self->token = $self->model->token;

            $self->service = $user->serviceInstance($self->driver);
            $self->service->authenticate($self->token);

            return $next($request);
        });
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function repositories()
    {
        $repos = $this->service
            ->repositories($this->username)
            ->all();

        return response($repos, 200);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function issues($repo, $state = 'open')
    {
        $issues = $this->service
            ->issues($this->username, $repo)
            ->all($state);

        return response($issues, 200);
    }
}