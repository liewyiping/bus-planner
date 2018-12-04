<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Trip;
use busplannersystem\Seat;
use busplannersystem\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class CreateSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($seatid)
    {

        $seatid=Seat::where('seatid', $seatid)->first();
<<<<<<< HEAD
        $trip_id=$seatid -> trip_id;
        $trip=Trip::where('trip_id', $trip_id)->first();
        return view('seat.seatlist',['seatid' => $seatid], ['trip' => $trip]);

=======

        // $trip_id=$seat_id -> trip_id;
        // $trip=Trip::where
        // return view('seat.seatlist',['seatid' => $seatid]);

        $trip_id=$seatid -> trip_id;
        $trip=Trip::where('trip_id', $trip_id)->first();

        $route_id=$trip -> route_id;
        $route=Route::where('route_id', $route_id) -> first();

        return view('seat.seatlist',['seatid' => $seatid], ['trip' => $trip], ['route'=> $route]);
>>>>>>> e1e5f6a9de986c6cecf2406c5b1ad57eeec5dce4
        
        //  1)fetch totalseat from model Bus to generate seats at view
       
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
        //
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
    public function edit(Request $request)
    {
        $seat = Seat::find($request -> seatid);
        $seatSelect=$request-> seat;
        $seatTaken = explode(",", $request->input('seatTaken'));
        $seatTaken=array_merge($seatSelect, $seatTaken);
        $seat -> seatTaken =implode(",", $seatTaken);
        $trip_id=$request -> trip_id;
        $seat ->save();
<<<<<<< HEAD
        return view('payment', ['trip_id' => $trip_id]);
=======
        return view('payment');
>>>>>>> e1e5f6a9de986c6cecf2406c5b1ad57eeec5dce4
        
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
