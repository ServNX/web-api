<?php

namespace App\Services\Github\Api;

use App\Services\Github\Contracts\RepositoriesInterface;

class Repositories extends AbstractApi implements RepositoriesInterface
{
    public function all()
    {
        return $this->github->api('user')->repositories($this->username);
    }

    public function create($name)
    {
        // TODO: Implement create() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function findByName($name)
    {
        // TODO: Implement findByName() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }
}