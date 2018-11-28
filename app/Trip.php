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

        //Create trip
        $bus_id=$request ->  input('bus_id');
        $trips = new Trip();
        $trips -> bus_id =  $bus_id;           
        $trips -> route_id = $request ->  input('route_id');  
        $trips -> date_depart = $request ->  input('date_depart');  
        $trips -> time_depart = $request ->  input('time_depart');  
         $trips -> ticket_price = $request ->  input('ticket_price');
        $trips -> save();




    }


  

    protected $primaryKey="trip_id";
}
