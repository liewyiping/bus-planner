<?php

namespace busplannersystem\Http\Controllers;
use busplannersystem\Route;
use busplannersystem\Terminal;
use busplannersystem\Bus;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    //
    public function index()
    {
        $routes = Route::all();
        $terminals = Terminal::all();
        $buses= Bus::all();
       // $routes = route::orderBy('routeID','desc')->get(); //susun ticketID by descending order.
    
       return view ('operator-views.operator-insert-route-info')->with('routes',$routes)->with('terminals',$terminals)->with('buses',$buses);



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

        $origin_terminal_id =  $request ->  input('origin_terminal');
        $destination_terminal_id = $request ->input('destination_terminal');

        $origin_terminal =Terminal::find($origin_terminal_id);
        $destination_terminal= Terminal::find($destination_terminal_id);

        $origin_terminal= $origin_terminal->terminal_station;
        $destination_terminal = $destination_terminal->terminal_station;
            

        //Create a new route
            $routes = new Route();
            $routes -> bus_id = $request ->  input('bus_id');            
            $routes -> origin_terminal = $origin_terminal;
            $routes -> destination_terminal =$destination_terminal;
           
          
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


