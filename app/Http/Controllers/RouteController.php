<?php

namespace busplannersystem\Http\Controllers;
use busplannersystem\Route;
use busplannersystem\BusRoute;
use busplannersystem\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RouteController extends Controller
{
    //
    public function index()
    {
        $routes = Route::all();
        $buses= Bus::all();
        $bus_routes = BusRoute::all();
        
       // $routes = route::orderBy('routeID','desc')->get(); //susun ticketID by descending order.
       
       return view ('operator-views.operator-insert-route-info')->with('routes',$routes)->with('buses',$buses)->with('bus_routes',$bus_routes);



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


