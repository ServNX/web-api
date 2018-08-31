<?php

namespace App\Services\Github;

use App\Contracts\ServiceInterface;
use App\Services\Github\Api\Issues;
use App\Services\Github\Api\Repositories;
use Github\Client;

class GithubService extends Client implements ServiceInterface
{
    public function authenticate($tokenOrLogin, $password = null, $authMethod = null)
    {
        parent::authenticate($tokenOrLogin, $password, Client::AUTH_HTTP_TOKEN);
    }

    public function repositories($username)
    {
        return (new Repositories($this, $username))->all();
    }

    public function issues($username, $repo, $state)
    {
        return (new Issues($this, $username, $repo))->all($state);
    }
}
