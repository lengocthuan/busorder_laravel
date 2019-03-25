<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    /*public function users()
    {
        return $this->hasMany('App\RoleUser', 'role_users', 'role_id', 'user_id');
    }*/
}
