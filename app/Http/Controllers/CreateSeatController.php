<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use busplannersystem\Trip;
use busplannersystem\Seat;
use busplannersystem\Bus;
use busplannersystem\Route;
use busplannersystem\Ticket;
use busplannersystem\Operator;
use busplannersystem\Company;
use busplannersystem\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


//DISPLAY SEAT LIST
class CreateSeatController extends Controller
{
    
    public function index($seatid)
    {
        $role = auth()->user()->role;
        switch ($role) 
        {
            case 'operator':
                    return view('operator-dashboard');
                break;
            case 'customer':
                $seatid=Seat::where('seatid', $seatid)->first();
        
                $trip_id=$seatid -> trip_id;
                $trip=Trip::where('trip_id', $trip_id)->first();

                $route_id=$trip -> route_id;
                $route_id=Route::where('route_id', $route_id) -> first();

                 // return view('seat.seatlist',['seatid' => $seatid], ['trip' => $trip], ['route_id'=> $route_id]);
                return view('seat.seatlist')->with('trip',$trip)->with('route_id', $route_id)->with('seatid', $seatid);

                 break;
            case 'admin':
                return view('admin');
            break;  

        }

        // $trip_id=$seatid -> trip_id;
        //         $trip=Trip::where('trip_id', $trip_id)->first();

        //         $route_id=$trip -> route_id;
        //         $route_id=Route::where('route_id', $route_id) -> first();

        //          // return view('seat.seatlist',['seatid' => $seatid], ['trip' => $trip], ['route_id'=> $route_id]);
        //         return view('seat.seatlist')->with('trip',$trip)->with('route_id', $route_id)->with('seatid', $seatid);
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
        $route=$request -> route_id;

        $point = Auth::user()->point;
        
        return view('payment')->with('totalprice', $totalprice)->with('trip_id', $trip_id)->with('route', $route)->with('point', $point);

        // return view('payment',['totalprice' => $totalprice],['trip_id' => $trip_id] );
    }


//TICKET
    public function store(Request $request)
    {
             
        $trip_id = $request-> trip_id;
        $trip_id=Trip::where('trip_id', $trip_id)->first();
        $date_depart = $trip_id -> date_depart;
        $time_depart = $trip_id -> time_depart;
        $trip_id = $trip_id -> trip_id; 

        $tickets= new Ticket();
        $tickets -> trip_id =$trip_id;
        $tickets -> company_name = "-";
        // $tickets -> from = $from ;
        // $tickets -> to= $to;
        $tickets -> date_depart =$date_depart;
        $tickets -> time_depart =$time_depart;
        $tickets ->  ticket_price=$request-> totalprice;
        $route_id = $request -> route_id; 
        $tickets -> route_id =$route_id ;
        $tickets -> save(); 

//for ticket details in view
        $route_id=Route::where('route_id', $route_id)->first();
        $trip_id=$request -> trip_id;
        $totalprice=$request -> totalprice;
        $trips= Trip::find($trip_id);

//find company name
        // $bus_id = $trips -> bus_id;
        // $bus = Bus::where('bus_id', $bus_id)->first();
        // $operator_id = $bus -> operator_id;
        // $operator =Operator::where('operator_id', $operator_id) ->first();
        // $bus_company_id = $operator -> bus_company_id;
        // $company=Company::where('bus_company_id', $bus_company_id)->first();
        // $bus_company_name=$company -> bus_company_name;


//UNCOMMENT PART NI!!!!
//add point to user acc --every rm20 get 5 points
        $addpoint=$totalprice / 10 * 3;
        $user_id = Auth::user()->user_id;
        $user=User::where('user_id', $user_id)->first();
        $point=$user -> point;
        $point+= $addpoint;
        $user -> point =$point;
        $user -> save();
        


        //sementara tiada company 
        $bus_company_name = "Company";
        
        return view('ticket')-> with('trips', $trips) -> with('totalprice', $totalprice) ->with('route_id', $route_id)->with('bus_company_name', $bus_company_name)->with('point', $point);
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
