<?php

namespace busplannersystem\Http\Controllers;
use busplannersystem\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
   

    public function index()
    {
        $buses = Bus::all();
        return view ('posts.operator-insert-bus')->with('buses',$buses);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {

        return view ('posts.operator-insert-bus');       
        

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

            'registration_plate' => 'required|string|max:20',
            'totSeat'=> 'required|integer|max:50',
            'id'=> 'required|integer|max:300',


        ]);

        //Create a new bus
            $buses = new Bus();
            $buses -> registration_plate = $request -> input('registration_plate');
            $buses -> totSeat = $request -> input('totSeat');
            $buses -> id = $request -> input('id');

            $buses -> save();

            return redirect('operator/insert-bus-info');


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
