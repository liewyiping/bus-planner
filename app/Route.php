<?php
namespace busplannersystem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Route extends Model
{

	protected $primaryKey = 'route_id';

    protected $fillable = [
        'route_name', 
        'operator_id' , 
        'origin_terminal',
        'destination_terminal',
        
    ];
    
    protected $table = 'routes';
    

    public function buses(){


        return $this->belongsTo('SPDP\Bus','bus_id');

    }

    public function create(Request $request){

        
        //Create the route name

        $origin_terminal_id =  $request ->  input('origin_terminal');
        $destination_terminal_id = $request ->input('destination_terminal');

        $origin_terminal =Terminal::find($origin_terminal_id);
        $destination_terminal= Terminal::find($destination_terminal_id);

        $origin_terminal= $origin_terminal->terminal_station;
        $destination_terminal = $destination_terminal->terminal_station;
            

            $routes = new Route();
            // $routes -> bus_id = $request ->  input('bus_id');            
            $routes -> origin_terminal = $origin_terminal;
            $routes -> destination_terminal =$destination_terminal;
            $routes -> save();
    }
}