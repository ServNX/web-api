<?php

namespace App\Repositories;

use App\Contracts\ServiceRepositoryInterface;
use App\Service;
use Illuminate\Auth\AuthManager;

class ServiceRepository extends AbstractCrudRepository implements ServiceRepositoryInterface
{
    /**
     * @var AuthManager
     */
    private $auth;

    public function __construct(Service $service, AuthManager $auth)
    {
        $this->repository = $service;
        $this->auth = $auth;
    }

    public function class()
    {
        return Service::class;
    }

    public function getService($service)
    {
        return $this->model()
            ->whereDriver($service)
            ->where('user_id', $this->auth->user()->id)
            ->first();

    }

    public function repositories($service)
    {
        $username = $this->getService($service)->username;
        $service = resolve("service.$service");
        return $service->repositories($username);
    }
}
