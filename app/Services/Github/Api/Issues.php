<?php

namespace App\Services\Github\Api;

use App\Services\Github\Contracts\RepositoriesInterface;
use App\Services\Github\GithubService;

class Issues extends AbstractApi implements RepositoriesInterface
{
    /**
     * @var string $repo
     */
    private $repo;

    public function __construct(GithubService $github, $username, $repo)
    {
        parent::__construct($github, $username);
        $this->repo = $repo;
    }

    public function all($state = 'open')
    {
        return $this->github
            ->api('issue')
            ->all($this->username, $this->repo, [
                'state' => $state
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
}