<?php

namespace App\Traits;

use App\Service;

trait HasServices
{
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function service($name)
    {
        return resolve("service.$name");
    }

}