<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Bus;
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


    public function index($busID)
    {
        //  1)fetch totalseat from model Bus to generate seats at view
        $totseat = DB::table('buses')->where('busID', $busID)->pluck('totalseat');
        
              return view('seat.createlist', compact('totseat','busID'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    $seats= new Seat();
   // $seats -> seatidolll = $request->input('busID');
        $seats -> busID = $request->input('busID');
        $seats -> seatNo = implode(",", $request -> allseatNo); //store array
        $seats -> seatTaken = 0;
        $seats -> seatAvail= implode(",", $request -> allseatNo);
        $seats -> save(); 
        
        return 'berjaya';
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
