<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use busplannersystem\Operator;

class Bus extends Model
{
    
    protected $primaryKey = 'bus_id';

    protected $fillable = [
         'total_seat', 'registration_plate', 'operator_id',


    ];

    protected $table = 'buses';

    public function create(Request $request){

     $user_id = auth()->user()->user_id;
     $operator_id = Operator::where('user_id_operators', '=', $user_id)->value('operator_id');
   //  $operator_id= DB::table('operators')->where('user_id_operators', $user_id)->value('operator_id');

     //create a new Bus
     $buses = new Bus();
     $buses -> registration_plate = $request -> input('registration_plate');
     $buses -> total_seat = $request -> input('total_seat');
     $buses -> bus_layout = $request -> input('bus_layout');

     $buses -> operator_id = $operator_id;
     $buses -> save();

    }

    public function operator(){

        return $this->belongsTo('busplannersystem\Operator', 'operator_id');
    
     }

     public function routes(){

          return $this->hasMany('busplannersystem\Route');
      
     }

     public function bus_routes(){

        return $this->hasMany('busplannersystem\BusRoute');
     
     }


}
