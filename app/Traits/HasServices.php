<?php

namespace App\Traits;

use App\Service;

trait HasServices
{
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function serviceInstance($name)
    {
        return resolve("service.$name");
    }

    public function serviceModel($name)
    {
        return $this->services()
            ->whereDriver($name)
            ->first();
    }

}