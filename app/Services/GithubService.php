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

    public function repositories($username)
    {
        return $this->client->api('user')->repositories($username);
    }
}
