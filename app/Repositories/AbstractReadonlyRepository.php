<?php

namespace App\Repositories;

use App\Contracts\RepositoryShouldRead;

abstract class AbstractReadonlyRepository implements RepositoryShouldRead
{
    protected $repository;

    public function all()
    {
        return $this->repository->all();
    }

    public function findById($id)
    {
        return $this->repository->find($id);
    }

    public function model()
    {
        return $this->repository;
    }
}