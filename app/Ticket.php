<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'name', 'description', 'price','time_allow_time', 'time_start', 'time_end', 'number_of_tickets',
    ];
}
