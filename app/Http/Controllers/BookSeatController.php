<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Trip;
use busplannersystem\Seat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BookSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($trip_id)
    {
        //  1)fetch totalseat from model Bus to generate seats at view
        $trip_id=$trip_id;
        // $totseat = DB::table('trips')->where('trip_id', $trip_id)->pluck('total_seat');
        //  $bus_layout = DB::table('trips')->where('trip_id', $trip_id)->pluck('bus_layout');

        $bus_id = DB::table('trips')->where('trip_id', $trip_id)->pluck('bus_id');
        $totseat = DB::table('buses')->where('bus_id', $bus_id)->pluck('total_seat');
        $bus_layout = DB::table('buses')->where('bus_id', $bus_id)->pluck('bus_layout');
        
        return view('seat.createlist', compact('totseat','trip_id', 'bus_layout'));
    }

    // {
    //     $route_id=Seat::where('route_id', $route_id)->first();
    //     return view('seat.createlist',['route_id' => $route_id]);
    // }

                  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $seats= new Seat();
   // $seats -> seatidolll = $request->input('busID');
        $seats -> trip_id = $request->input('trip_id');
        $seats -> seatNo = implode(",", $request -> allseatNo); //store array
        $seats -> seatTaken = 0;
        $seats -> seatAvail= implode(",", $request -> allseatNo);
        $seats -> bus_layout =$request->input('bus_layout');
        $seats -> save(); 
        
        
        
        //return 'berjaya';

        return redirect('operator/insert-trip-info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Bus::find($id);  
        return view('seat.seatlist')->with('post', $post);  }

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
