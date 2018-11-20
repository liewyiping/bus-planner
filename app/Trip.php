<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    
    protected $fillable = [
        'bus_id', 
        'route_id' , 
        'date_depart','time_depart','ticket_price',
        
    ];

    protected $primaryKey="trip_id";
}
