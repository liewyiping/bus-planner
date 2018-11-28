<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Bus extends Model
{
    
    protected $primaryKey = 'bus_id';

    protected $fillable = [
         'total_seat', 'registration_plate', 'operator_id',


    ];

    protected $table = 'buses';

    public function create(Request $request){

     $operator_id = auth()->user()->user_id;

     //create a new Bus
     $buses = new Bus();
     $buses -> registration_plate = $request -> input('registration_plate');
     $buses -> total_seat = $request -> input('total_seat');
     $buses -> bus_layout = $request -> input('bus_layout');

     $buses -> operator_id = $operator_id;
     $buses -> save();

    }

    public function user(){

        return $this->belongsTo('busplannersystem\User');
    
     }

     public function routes(){

          return $this->hasMany('busplannersystem\Route');
      
     }

     public function buses(){

        return $this->hasMany('busplannersystem\BusRoute');
     
     }


}
