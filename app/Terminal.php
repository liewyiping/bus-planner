<?php

namespace busplannersystem;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    protected $primaryKey = 'terminal_id'; 




    public function create(Request $request){

        //Create the name for the terminal
        $terminal_station= $request ->  input('terminal_station');          
        $terminal_area=$request ->  input('terminal_area');
        $terminal_city=  $request ->  input('terminal_city');
        $terminal_states= $request ->  input('terminal_states');
        $terminal_location= $terminal_station.', '.$terminal_area.', '.$terminal_city.', '.$terminal_states;

        //Create a new terminal in database
            $terminals = new Terminal();
            $terminals -> terminal_station =  $terminal_station;            
            $terminals -> terminal_area =   $terminal_area;                
            $terminals -> terminal_city =     $terminal_city;              
            $terminals -> terminal_states =      $terminal_states;     
            $terminals -> terminal_location =      $terminal_location;         
          
            $terminals -> save();
        
    }
}
