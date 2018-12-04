<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Trip;
use busplannersystem\Seat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use busplannersystem\Route;


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
        
        $trip_id=$seatid -> trip_id;
        $trip=Trip::where('trip_id', $trip_id)->first();

        $route_id=$trip -> route_id;
        $route=Route::where('route_id', $route_id) -> first();

        return view('seat.seatlist',['seatid' => $seatid], ['trip' => $trip], ['route'=> $route]);
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
        // $trip_id=Trip::where($request -> input('trip_id'));
        // $priceEach= $trip_id -> ticket_price;

        $seat = Seat::find($request -> seatid);
        $seatSelect=$request-> seat;

        // $priceTot=$priceEach * count($seatSelect);

        $seatTaken = explode(",", $request->input('seatTaken'));
        $seatTaken=array_merge($seatSelect, $seatTaken);
        $seat -> seatTaken =implode(",", $seatTaken);
        $seat ->save();
        $totalprice=$request -> totalprice;
        
        return view('payment')->with('totalprice', $totalprice);
        
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
