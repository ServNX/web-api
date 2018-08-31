<?php

namespace App\Services;

abstract class BaseService
{
    abstract public function getClient();
    abstract public function authenticate($usernameOrToken, $password = null, $method = null);
    abstract public function repositories($username);


}