<?php

namespace busplannersystem;
use Illuminate\Http\Request;
use busplannersystem\Seat;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    
    protected $fillable = [
        'bus_id', 
        'route_id' , 
        'date_depart','time_depart','ticket_price',
        
    ];

    public function create(Request $request){




    }


  

    protected $primaryKey="trip_id";

    public function route()
    {
        return $this->belongsTo('busplannersystem\Route', 'route_id');
    }
}
