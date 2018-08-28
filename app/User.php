<?php

namespace App;

use App\Traits\HasServices;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasServices;

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token'];

}
