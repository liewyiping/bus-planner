<?php

namespace busplannersystem\Http\Controllers;
use busplannersystem\Route;
use busplannersystem\BusRoute;
use busplannersystem\Bus;
use busplannersystem\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    //
    public function index()
    {   
        //Get user id from auth
        $user_id = auth()->user()->user_id;
        //Search operators table to find buses belong to operator_id
        $operator_id = Operator::where('user_id_operators', '=', $user_id)->value('operator_id');
       $buses= Bus::where('operator_id', $operator_id)->get();
        //Get list of buses_id from the buses
        $buses_id= $buses->pluck('bus_id');
        //Get the list of registered bus_id by referring to operator_id
        $bus_routes = DB::table('bus_routes')->whereIn('bus_id', $buses_id)->get();

        $bus_routes=BusRoute::whereIn('bus_id',$buses_id)->get();
       

        $routes=Route::all();

        
        
      
    
     return view ('operator-views.operator-insert-route-info')->with('routes',$routes)->with('buses',$buses)->with('bus_routes',$bus_routes);

   // return view ('operator-views.operator-insert-route-info')->with('routes',$routes)->with('buses',$operator_id->buses)->with('bus_routes',$bus_routes);
   


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    


    public function create(array $data)
    {

           
        

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[

            
            'route_id' => 'required|integer|min:1',
            'bus_id'=> 'required|string|min:1',
           
           

        ]);


        $bus_routes = new BusRoute();
        $bus_routes -> route_id = $request ->  input('route_id');            
        $bus_routes -> bus_id = $request ->  input('bus_id');
        $bus_routes -> save();

        return redirect('operator/insert-route-info');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dhhhf
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


