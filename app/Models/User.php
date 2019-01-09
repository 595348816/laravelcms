<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable,HasRoles;

    protected $table='system_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return array JWT 载荷中增加的自定义内容
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @return mixed 获取用户id
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
}
