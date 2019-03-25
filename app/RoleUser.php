<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_users';

    /*public function users()
    {
        return $this->belongsTo('App\User', 'role_id', 'user_id');
    }
    public function roles()
    {
        return $this->belongsTo('App\Role', 'user_id','role_id');
    }*/
}
