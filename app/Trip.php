<?php

namespace busplannersystem;
use Illuminate\Http\Request;
use busplannersystem\Seat;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    
    protected $fillable = [
        'bus_id', 
        'route_id' , 
        'date_depart','time_depart','ticket_price',
        
    ];

    public function create(Request $request){

        $bus_id=$request ->  input('bus_id');

        $trips= new Trip();
        $trips -> bus_id =  $bus_id;           
        $trips -> route_id = $request ->  input('route_id');  
        $trips -> date_depart = $request ->  input('date_depart');  
        $trips -> time_depart = $request ->  input('time_depart');  
        $trips -> ticket_price = $request ->  input('ticket_price');
        $trips -> save();

         $trip_id=$trips->trip_id;
         
         $bus_id = DB::table('trips')->where('trip_id', $trip_id)->pluck('bus_id');
         $totseat = DB::table('buses')->where('bus_id', $bus_id)->pluck('total_seat');
         $bus_layout = DB::table('buses')->where('bus_id', $bus_id)->value('bus_layout');

         
        $seat=new Seat();
        $seat->create($request,$trip_id,$bus_id,$totseat,$bus_layout);


    }


  

    protected $primaryKey="trip_id";

    public function route()
    {
        return $this->belongsTo('busplannersystem\Route', 'route_id');
    }

    public function bus()
    {
        return $this->belongsTo('busplannersystem\Bus', 'bus_id');
    }

    public function tickets()
    {
        return $this->hasMany('busplannersystem\Ticket', 'ticket_id');
    }

    


}
