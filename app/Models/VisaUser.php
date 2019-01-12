<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class VisaUser extends Authenticatable implements JWTSubject
{
    protected $fillable = [
        'mobile','password','appsecret','appid'
    ];
    protected $hidden=[
        'password','appsecret'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
