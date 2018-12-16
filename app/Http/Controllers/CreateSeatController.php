<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Trip;
use busplannersystem\Seat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use busplannersystem\Route;
use busplannersystem\Ticket;
//DISPLAY SEAT LIST
class CreateSeatController extends Controller
{
    
    public function index($seatid)
    {
        $role = auth()->user()->role;
        switch ($role) {
            case 'operator':
                    return view('operator-dashboard');
                break;
            case 'customer':
                $seatid=Seat::where('seatid', $seatid)->first();
        
                $trip_id=$seatid -> trip_id;
                $trip=Trip::where('trip_id', $trip_id)->first();

                $route_id=$trip -> route_id;
                $route=Route::where('route_id', $route_id) -> first();

                 return view('seat.seatlist',['seatid' => $seatid], ['trip' => $trip], ['route'=> $route]);
                 break;
            case 'admin':
                return view('admin');
            break;  

        }
    }

    
    

    

    //ADD SEAT NO IN SEAT TAKEN COLUMN AFTER SELECT SEAT
    public function edit(Request $request)
    {
        
        $seat = Seat::find($request -> seatid);
        $seatSelect=$request-> seat;
        $seatTaken = explode(",", $request->input('seatTaken'));
        $seatTaken=array_merge($seatSelect, $seatTaken);
        $seat -> seatTaken =implode(",", $seatTaken);
        $seat ->save();
        $totalprice=$request -> totalprice;
        $trip_id=$request -> trip_id;
        
        // return view('payment')->with('totalprice', $totalprice);
        return view('payment',['totalprice' => $totalprice],['trip_id' => $trip_id] );
    }


 //TICKET
    public function store(Request $request)
    {
       


        $tickets= new Ticket();
        $tickets -> trip_id = "1";
        $tickets -> company_name = "-"; //store array
        $tickets -> from = "-";
        $tickets -> to= "-";
        // $tickets -> date_depart =$request->input('date_depart');
        // $tickets -> time_depart =$request->input('time_depart');
        $tickets -> date_depart ="date";
        $tickets -> time_depart ="time";
        $tickets ->  ticket_price=$request->input('totalprice');
        // $tickets ->  route_id=$request->input('');
        $tickets ->  route_id="-";
        $tickets -> save(); 

        $trip_id=$request -> trip_id;
        $totalprice=$request -> totalprice;
        $trips= Trip::find($trip_id);
        return view('ticket', ['trips' => $trips],['totalprice' => $totalprice]);
    }

public function create()
    {
        //
    }


   
    

    
    public function show()
    {
        return 'success';
    }

    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        //
    }
}
