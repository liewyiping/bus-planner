<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use busplannersystem\Driver;

class Driver extends Model
{
    protected $primaryKey = 'driver_id';

    protected $fillable = [
        'driver_name', 'driver_ic' , 'driver_email' ,'driver_address', 
 
 
    ];

    protected $table = 'drivers';

    public function create(Request $request){

     $driver = new Driver();
     $driver -> driver_id =  $driver_id;  
     $driver -> driver_name = $request -> input('driver_name');
     $driver -> driver_ic = $request -> input('driver_ic');
     $driver -> driver_email = $request -> input('driver_email');
     $driver -> driver_address = $request -> input('driver_address');          
     $driver -> save();
    }
}
