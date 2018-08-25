<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository extends AbstractCrudRepository implements UserRepositoryInterface
{

    public function __construct(User $user)
    {
        $this->repository = $user;
    }

    public function class()
    {
        return User::class;
    }

    public function model()
    {
        return $this->repository;
    }
}
