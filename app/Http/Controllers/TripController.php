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

        $bus_id=$request ->  input('bus_id');
        $trips = new Trip();
        $trips -> bus_id =  $bus_id;           
        $trips -> route_id = $request ->  input('route_id');  
        $trips -> date_depart = $request ->  input('date_depart');  
        $trips -> time_depart = $request ->  input('time_depart');  
        $trips -> ticket_price = $request ->  input('ticket_price');
        $trips -> save();

        //Get data from database into creating a seat
        $trip_id=$trips->trip_id;
        $totseat=[45]; //Assuming bus has 45 seats standard.
        $busID=$trips->bus_id;
        $bus_layout = DB::table('buses')->where('bus_id', $busID)->pluck('total_seat');

        //return redirect('seat.createlist')->with('trip_id',$trip_id)->with($totseat)->with($bus_layout);

        //return redirect('seat.createlist', compact('totseat','trip_id', 'bus_layout'));

        return redirect()->route('operator.createSeatInfo', ['ID' => $trip_id]);
        


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
