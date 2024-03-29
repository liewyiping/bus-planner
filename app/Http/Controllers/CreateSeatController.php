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
            $user_id = auth()->user()->user_id;
            $operator_id = Operator::where('user_id_operators', '=', $user_id)->value('operator_id');

            //return $operator_id;
            $bus_company_id = Operator::where('user_id_operators', '=', $user_id)->value('bus_company_id');
            $company_id = Company::where('bus_company_id', '=', $bus_company_id)->value('bus_company_id');
            $company_name = Company::where('bus_company_id', '=', $bus_company_id)->value('bus_company_name');
            $company_address = Company::where('bus_company_id', '=', $bus_company_id)->value('bus_company_address');
                    return view('operator-dashboard')->with('operator_id',$operator_id)->with('bus_company_id',$bus_company_id)
                    ->with('company_id',$company_id)->with('company_name',$company_name)->with('company_address',$company_address);
                break;
            case 'customer':

                $seatid=Seat::where('seatid', $seatid)->first();
        
                $trip_id=$seatid -> trip_id;
                $trip=Trip::where('trip_id', $trip_id)->first();

                $route_id=$trip -> route_id;
                $route_id=Route::where('route_id', $route_id) -> first();

                return view('seat.seatlist')
                ->with('trip',$trip)
                ->with('route_id', $route_id)
                ->with('seatid', $seatid);

                 break;
            case 'admin':
                return view('admin');
            break;  

        }
    }

    
    

//GET SEAT_NO
    public function edit(Request $request)
    {
        
        $seat = Seat::find($request -> seatid);
        $seatid = $seat -> seatid;
        $seatSelect = $request-> seat;
        $seatTaken = explode(",", $request->input('seatTaken'));
        $seatTaken = array_merge($seatSelect, $seatTaken);
        $seatTaken = implode(",", $seatTaken);
        
        $totalprice = $request -> totalprice;
        $trip_id = $request -> trip_id;
        $route = $request -> route_id;
        $pax_num = $request -> pax_num;

        $point = Auth::user()->point;
        $seatSelect = implode(",", $seatSelect); //**
        
        return view('payment')
        ->with('totalprice', $totalprice)
        ->with('trip_id', $trip_id)
        ->with('route', $route)
        ->with('point', $point)
        ->with('seatTaken', $seatTaken)
        ->with('seatid', $seatid)
        ->with('pax_num', $pax_num)
        ->with('seatSelect', $seatSelect);
    }


//TICKET
    public function store(Request $request)
    {
//add selected seat id to column seatTaken
        $seat = Seat::find($request -> seatid);
        $seat -> seatTaken =$request -> seatTaken;
        $seat ->save();

//find time & date from table trips             
        $trip_id = $request-> trip_id;
        $trips=Trip::where('trip_id', $trip_id)->first();
        $date_depart = $trips -> date_depart;
        $time_depart = $trips -> time_depart;
        $trip_id = $trips -> trip_id; 

//find company name
        $bus_id = $trips -> bus_id;
        $bus = Bus::where('bus_id', $bus_id)->first();
        $operator_id = $bus -> operator_id;
        $operator = Operator::where('operator_id', $operator_id)->first();
        $bus_company_id = $operator -> bus_company_id;
        $company = Company::where('bus_company_id', $bus_company_id)->first();
        $bus_company_name = $company -> bus_company_name;


//create ticket--store above infos to table ticket
        $tickets = new Ticket();
        $tickets -> trip_id = $trip_id;
        $user_id = auth()->user()->user_id;
        $tickets -> user_id = $user_id;
        $tickets -> company_name = $bus_company_name;
        $tickets -> date_depart = $date_depart;
        $tickets -> time_depart = $time_depart;
        $tickets ->  ticket_price = $request-> totalprice;
        $tickets -> pax_num=$request -> pax_num;
        $route_id = $request -> route_id; 
        $tickets -> route_id = $route_id ;
        $tickets -> seatSelect = $request -> seatSelect;

//for ticket details in view
        $route_id=Route::where('route_id', $route_id)->first();
        $totalprice=$request -> totalprice;
        $origin_terminal=$route_id -> origin_terminal;
        $destination_terminal=$route_id -> destination_terminal;
        $tickets -> origin_terminal=$origin_terminal;
        $tickets -> destination_terminal=$destination_terminal;
        $tickets -> save(); 



//point addition & deduction to table user 
        $point = $request -> point; //-50 point if redeem  
        $addpoint = $totalprice / 10 * 3; //every rm10 get 3 points
        $point += $addpoint;
        $user_id = Auth::user()->user_id;
        $user = User::where('user_id', $user_id)->first();
        $user -> point =$point;
        $user -> save();

        return view('ticket')
        -> with('trips', $trips) 
        ->with('route_id', $route_id)
        ->with('point', $point)
        ->with('tickets', $tickets);
    }

 
    //SHOW BACK TICKET (from dropwdown in app.blade)
    public function showticket(Request $request, $ticket_id)
    {
        $tickets=Ticket::where('ticket_id', $ticket_id)->first();
        $trip_id= $tickets -> trip_id;
        $trips=Trip::where('trip_id', $trip_id)->first();
        $route_id= $tickets -> route_id;
        $bus_company_name= $tickets -> bus_company_name;
        $user_id = Auth::user()->user_id;
        $user=User::where('user_id', $user_id)->first();
        $point = $user -> point;
        $route_id=$tickets -> route_id;
        $route_id=Route::where('route_id', $route_id)->first();

        return view('ticket')
        -> with('trips', $trips) 
        ->with('route_id', $route_id)
        ->with('bus_company_name', $bus_company_name)
        ->with('point', $point)
        ->with('tickets', $tickets);

    }

    public function home()
    {
        return redirect ('/home');
    }

}
