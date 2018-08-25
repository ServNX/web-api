<?php

namespace App\Contracts;

interface ServiceRepositoryInterface extends RepositoryShouldCrud
{
    public function getService($service);
    public function repositories($username);
}