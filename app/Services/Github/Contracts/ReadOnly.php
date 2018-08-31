<?php

namespace App\Services\Github\Contracts;

interface ReadOnly
{
    public function all();
    public function findByName($name);
    public function findById($id);
}