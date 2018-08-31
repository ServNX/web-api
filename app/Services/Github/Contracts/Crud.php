<?php

namespace App\Services\Github\Contracts;

interface Crud extends ReadOnly
{
    public function create($name);
    public function update();
    public function delete($id);
}