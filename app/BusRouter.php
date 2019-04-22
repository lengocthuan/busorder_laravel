<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusRouter extends Model
{
    protected $table = 'bus_routers';

    protected $fillable = [
        'name', 'description', 'starting_point', 'destination', 'updated_at',
    ];

    public function location()
    {
        return $this->belongsTo('App\Location', 'starting_point', 'id');
    }
}
