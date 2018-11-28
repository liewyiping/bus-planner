<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'trip_id', 
        'bus_layout' , 
        
    ];
    

    
}
