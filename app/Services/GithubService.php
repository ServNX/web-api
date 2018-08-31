<?php

namespace App\Services;

use Github\Client;

class GithubService extends BaseService
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function authenticate($usernameOrToken, $password = null, $method = null)
    {
        $this->client->authenticate($usernameOrToken, $password, Client::AUTH_HTTP_TOKEN);
    }

    public function repositories($username)
    {
        return $this->client->api('user')->repositories($username);
    }
}
