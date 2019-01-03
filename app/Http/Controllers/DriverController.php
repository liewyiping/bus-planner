<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Driver;
use busplannersystem\Operator;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id = Auth::user()->user_id;

        

        
        $operator_id = Operator::where('user_id_operators', $user_id)->value('operator_id');

        

        
        $operator=Operator::find($operator_id);
        $bus_company_id=$operator->company->bus_company_id; //get the company name of the bus using eloquent orm yang kita dah set dalam model operator

        $drivers = Driver::where('bus_company_id',$bus_company_id)->get();
        return view ('operator-views.operator-insert-driver')->with('drivers',$drivers);
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

            'driver_name' => 'required|string|max:255',
            'driver_ic' => 'required|string|max:255',
            'driver_email' => 'required|email|max:255',
            'driver_address' => 'required|string|max:255',

        ]);

        $drivers = new Driver();
        $drivers->create($request);
        return redirect('operator/insert-driver');

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
