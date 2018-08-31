<?php

namespace App\Services\Github\Api;

use App\Services\Github\GithubService;

abstract class AbstractApi
{
    /**
     * @var GithubService
     */
    protected $github;

    /**
     * @var string $username
     */
    protected $username;

    public function __construct(GithubService $github, $username)
    {
        $this->github = $github;
        $this->username = $username;
    }
}