<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Bus;
use Illuminate\Support\Facades\DB;

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
        $buses = DB::table('buses')->where('busID', $busID)->pluck('totalseat');
       //echo $buses;
        //  2)return totalseat to view
                return view('seat.seatlist')->with('buses', $buses);
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    /* $seats = $request->input('seat', 'noneeee');
                if($seats != NULL) {
                    return view('');
                } */
                return view('seat.seatlist');
              //  return 'it works';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        //return 'it works';e

        //$inputs=new Inputs();
        //$inputs->seat=request('')

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
