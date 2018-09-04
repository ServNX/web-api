<?php

namespace App\Services\Github\Api;

use App\Services\Github\Contracts\RepositoriesInterface;

class Repositories extends AbstractApi implements RepositoriesInterface
{
    public function all()
    {
        $data = $this->github->api('user')->repositories($this->username);

        return $this->resourceCollection($data, [
            'stars' => 'stargazers_count'
        ]);
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

    protected function resourceCollection(array $data, array $map = [])
    {
        $collection = collect([]);

        foreach ($data as $d) {
            $collection->push([

                'name' => array_key_exists('name', $map)
                    ? $d[$map['name']]
                    : $d['name'],

                'open_issues' => array_key_exists('open_issues', $map)
                    ? $d[$map['open_issues']]
                    : $d['open_issues'],

                'forks' => array_key_exists('forks', $map)
                    ? $d[$map['forks']]
                    : $d['forks'],

                'stars' => array_key_exists('stars', $map)
                    ? $d[$map['stars']]
                    : $d['stars'],

                'watchers' => array_key_exists('watchers', $map)
                    ? $d[$map['watchers']]
                    : $d['watchers'],
            ]);
        }

        return $collection;
    }
}