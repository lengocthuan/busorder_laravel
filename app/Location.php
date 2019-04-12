<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    public function starting_point()
    {
        return $this->hasMany('App\BusRouter', 'starting_point', 'id');
    }

}
