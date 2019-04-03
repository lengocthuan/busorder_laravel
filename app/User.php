<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'userName', 'email', 'passWord', 'confirmpassword',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'passWord', 'remember_token', 'confirmpassword',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function roles()
    {
    return $this->hasMany('App\RoleUser', 'role_users', 'user_id','role_id');
    }
    */
    public function setPasswordAttribute($password)
    {
        $this->attributes['passWord'] = MD5($password);
    }
}
