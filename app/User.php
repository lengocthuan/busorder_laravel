<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
     use \Illuminate\Auth\Authenticatable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'username', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function usersroles()
    {
        //return $this->hasMany('App\RoleUser', 'role_users', 'user_id','role_id');
        //return $this->hasMany('App\RoleUser', 'user_id', 'id');
    }
    
    // public function setPasswordAttribute($password)
    // {
    //     /**/$this->attributes['passWord'] = bcrypt($password);/**/
    // }
}
