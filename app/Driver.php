<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use busplannersystem\Driver;
use Illuminate\Support\Facades\Auth;

class Driver extends Model
{
    protected $primaryKey = 'driver_id';

    protected $fillable = [
        'driver_name', 'driver_ic' , 'driver_email' ,'driver_address', 
 
 
    ];

    protected $table = 'drivers';

    public function create(Request $request){

        $user_id = Auth::user()->user_id;
        $operator_id = Operator::where('user_id_operators', '=', $user_id)->value('operator_id');
        $operator=Operator::find($operator_id);
        $bus_company_id=$operator->company->bus_company_id; //get the company name of the bus using eloquent orm yang kita dah set dalam model operator

     $driver = new Driver();
    
     $driver -> driver_name = $request -> input('driver_name');
     $driver -> driver_ic = $request -> input('driver_ic');
     $driver -> driver_email = $request -> input('driver_email');
     $driver -> driver_address = $request -> input('driver_address'); 
     $driver -> bus_company_id =$bus_company_id;         
     $driver -> save();
    }
}
