<?php

namespace busplannersystem\Http\Controllers;

use busplannersystem\Trip;
use busplannersystem\Route;
use busplannersystem\Bus;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips= Trip::all();
        $routes=Route::all();
        $buses= Bus::all();

        return view('operator-views.operator-insert-trip')->with('trips',$trips)->with('routes',$routes)->with('buses',$buses);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            
            'bus_id' => 'required|string|max:255',
            'route_options'=> 'required|string|max:255',
            'date_depart'=> 'required|string|max:255',
            'time_depart'=> 'required|string|max:255',
            'ticket_price'=> 'required|string|max:255',
           

        ]);


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
     * @param  \busplannersystem\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \busplannersystem\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \busplannersystem\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \busplannersystem\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
