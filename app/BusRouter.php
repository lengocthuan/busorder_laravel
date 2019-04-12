<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusRouter extends Model
{
    protected $table = 'bus_routers';

    public function location()
    {
        return $this->belongsTo('App\Location', 'starting_point', 'id');
    }
}
