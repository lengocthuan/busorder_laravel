<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_users';

    public function users()
    {
        // return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function roles()
    {
        // return $this->belongsTo('App\Role', 'role_id','id');
    }
}
