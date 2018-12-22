<?php

namespace busplannersystem\Http\Controllers;

use busplannersystem\Trip;
use busplannersystem\Route;
use busplannersystem\Bus;
use busplannersystem\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        $routes = Route::all();
        $buses = Bus::all();

        // return view('operator-views.operator-insert-trip')->with('trips',$trips)->with('routes',$routes)->with('buses',$buses);
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

            
            'bus_id' => 'required|integer|min:1',
            'route_id'=> 'required|string|min:1',
            // 'date_depart'=> 'required|date|after:yesterday',
            'date_depart'=> 'required|string|',
            'time_depart'=> 'required|string',
            //  'ticket_price'=> 'required|between:0,1000.00'
            'ticket_price'=> 'required|regex:/^\d*(\.\d{1,4})?$/',
            // 'ticket_price'=> 'required|regex:/^\d*(\.\d{2})?$/',
           
           

        ]);

       
        $trip = new Trip();
        $trip->create($request);
        return redirect('operator/insert-trip-info');
        


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
