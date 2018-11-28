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
        return view ('operator-views.operator-insert-bus')->with('buses',$buses);
    }

    public function indexView()
    {
        $buses = Bus::paginate(3);
        return view ('operator-views.operator-view-bus')->with('buses',$buses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {

        return view ('operator-views.operator-insert-bus');       
        

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
            'total_seat'=> 'required|integer|max:70',
            'bus_layout' => 'required|string|max:20',
            


        ]);


        
        //Create a new bus
            $buses = new Bus();
            $buses ->create($request);
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
        //delete
        $bus = Bus::find($id);
        $bus->delete();

        // redirect
        return redirect('operator/view-bus-info');
    }
}
