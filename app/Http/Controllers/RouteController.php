<?php

namespace busplannersystem\Http\Controllers;
use busplannersystem\Route;
use busplannersystem\Terminal;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    //
    public function index()
    {
        $routes = Route::all();
        $terminals = Terminal::all();
       // $routes = route::orderBy('routeID','desc')->get(); //susun ticketID by descending order.
    
       return view ('operator-views.operator-insert-route-info')->with('routes',$routes)->with('terminals',$terminals);



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

            
            'origin_terminal' => 'required|string|max:255',
            'destination_terminal'=> 'required|string|max:255',
           

        ]);

        //Create the route name

        $origin_terminal =  $request ->  input('origin_terminal');
            

        //Create a new route
            $routes = new Route();
            $routes -> route_name =         $request ->  input('route_name');            
            $routes -> origin_terminal =      $request ->  input('origin_terminal');
            $routes -> destination_terminal = $request ->  input('destination_terminal');
            $routes -> operatorID =          $request ->  input('operatorID');
          
            $routes -> save();

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
        //
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


