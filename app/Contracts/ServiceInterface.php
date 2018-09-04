<?php

namespace App\Contracts;

interface ServiceInterface
{
    public function authenticate($tokenOrLogin, $password = null, $authMethod = null);
    public function repositories($username);
    public function issues($username, $repo);
}