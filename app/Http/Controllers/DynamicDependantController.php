<?php

namespace busplannersystem\Http\Controllers;

use busplannersystem\DynamicDependant;
use Illuminate\Http\Request;
use busplannersystem\Trip;
use busplannersystem\Route;
use busplannersystem\Bus;
use busplannersystem\BusRoute;
use busplannersystem\Seat;

use Illuminate\Support\Facades\DB;

class DynamicDependantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $trips = Trip::all();
        $buses = DB::table('bus_routes')
        ->groupBy('bus_id')
        ->get();    
        return view('operator-views.insert-dynamic-trip')->with('buses',$buses);
    }

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('bus_routes')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
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
     * @param  \busplannersystem\DynamicDependant  $dynamicDependant
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicDependant $dynamicDependant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \busplannersystem\DynamicDependant  $dynamicDependant
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicDependant $dynamicDependant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \busplannersystem\DynamicDependant  $dynamicDependant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DynamicDependant $dynamicDependant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \busplannersystem\DynamicDependant  $dynamicDependant
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicDependant $dynamicDependant)
    {
        //
    }
}
