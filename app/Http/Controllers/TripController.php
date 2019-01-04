<?php
namespace busplannersystem\Http\Controllers;
use busplannersystem\Trip;
use busplannersystem\Route;
use busplannersystem\Bus;
use busplannersystem\BusRoute;
use busplannersystem\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->user_id;
        
       
        $buses = Bus::all()->where('operator.user_id_operators', $id);
        $buses_id =$buses->pluck('bus_id');

        $routes = Route::all();
        $trips = Trip::whereIn('bus_id',$buses_id)->simplePaginate(10);

        
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
       
        $trip = new Trip();
        $trip->create($request);
        return redirect('operator/insert-trip-info');
        
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trip = Trip::find($id);
        return view('operator-views.operator-edit-trip', compact('trip', 'id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $this->validate($request, [
                //'bus_id' => 'required',
                //'route_id' => 'required',
                'date_depart' => 'required',
                'time_depart' => 'required',
                'ticket_price' => 'required',
            ]);
            
            $trip = Trip::find($id);
           // $trip->bus_id = $request->get('bus_id');
           // $trip->route_id = $request->get('route_id');
            $trip->date_depart = $request->get('date_depart');
            $trip->time_depart = $request->get('time_depart');
            $trip->ticket_price = $request->get('ticket_price');
    
            $trip->save();
            return redirect('operator/insert-trip-info')->with('success', 'Trip Info Updated');
            
            }catch (Exception $e) {
                return view('errors.1062');
            }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::find($id);
        $trip->delete();

        return redirect('operator/insert-trip-info');
    }
}