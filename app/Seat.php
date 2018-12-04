<?php

namespace busplannersystem;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'trip_id', 
        'seatNo', 'seatTaken', 'seatAvail', 'bus_layout' , 
        
    ];
    
    public $timestamps=false;

    public function create(Request $request,$trip_id,$bus_id,$totseat,$bus_layout){


            $allseatNo = array();
            $bus_layout=$bus_layout;
        
            //Array to create seats into an object
            for ($i = 1; $i <= $totseat[0]; ++$i) {
                $allseatNo[] = $i;
            }
            
            $seats= new Seat();
            $seats -> trip_id =$trip_id;
            $seats -> seatNo = implode(",", $allseatNo); //store array
            $seats -> seatTaken = 0;
            $seats -> seatAvail= implode(",", $allseatNo);
            $seats -> bus_layout =$bus_layout;
            $seats -> save(); 
             

    }

    protected $primaryKey = 'seatid';

    public function trip()
    {
        return $this->belongsTo('busplannersystem\Trip', 'trip_id');
    }
    
}
