<?php

namespace App\Services\Github\Api;

use App\Services\Github\Contracts\RepositoriesInterface;
use App\Services\Repository;

class Repositories extends AbstractApi implements RepositoriesInterface
{
    public function all()
    {
        $collection = collect([]);
        $repos = $this->github->api('user')->repositories($this->username);

        foreach ($repos as $repo) {
            $collection->push(new Repository(
                $repo['name'],
                $repo['open_issues'],
                $repo['forks'],
                $repo['stargazers_count'],
                $repo['watchers']
            ));
        }

        return $collection;
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