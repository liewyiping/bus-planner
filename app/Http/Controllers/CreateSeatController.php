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

                return view('seat.seatlist')->with('trip',$trip)->with('route_id', $route_id)->with('seatid', $seatid);

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
        $seatid=$seat -> seatid;
        $seatSelect=$request-> seat;
        $seatTaken = explode(",", $request->input('seatTaken'));
        $seatTaken=array_merge($seatSelect, $seatTaken);
        $seatTaken=implode(",", $seatTaken);
        // $seat -> seatTaken =implode(",", $seatTaken);

        // $seat ->save();
        $totalprice=$request -> totalprice;
        $trip_id=$request -> trip_id;
        $route=$request -> route_id;
        $pax_num=$request -> pax_num;

        $point = Auth::user()->point;
        
        return view('payment')->with('totalprice', $totalprice)->with('trip_id', $trip_id)->with('route', $route)->with('point', $point)->with('seatTaken', $seatTaken)->with('seatid', $seatid)->with('pax_num', $pax_num);
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
        $operator_id=$bus -> operator_id;
        $operator=Operator::where('operator_id', $operator_id)->first();
        $bus_company_id=$operator -> bus_company_id;
        $company=Company::where('bus_company_id', $bus_company_id)->first();
        $bus_company_name=$company -> bus_company_name;




//create ticket--store above infos to table ticket
        $tickets= new Ticket();
        $tickets -> trip_id =$trip_id;
        $user_id = auth()->user()->user_id;
        $tickets -> user_id = $user_id;
        $tickets -> company_name = $bus_company_name;
        $tickets -> date_depart =$date_depart;
        $tickets -> time_depart =$time_depart;
        $tickets ->  ticket_price=$request-> totalprice;
        $tickets -> pax_num=$request -> pax_num;
        $route_id = $request -> route_id; 
        $tickets -> route_id =$route_id ;

//for ticket details in view
        $route_id=Route::where('route_id', $route_id)->first();
        $totalprice=$request -> totalprice;
        $destination_terminal=$route_id -> destination_terminal;

        $tickets -> destination_terminal=$destination_terminal;
        $tickets -> save(); 



//point addition & deduction to table user 
        $point=$request -> point; //-50 point if redeem  
        $addpoint=$totalprice / 10 * 3; //every rm10 get 3 points
        $point+=$addpoint;
        $user_id = Auth::user()->user_id;
        $user=User::where('user_id', $user_id)->first();
        $user -> point =$point;
        $user -> save();

        
        
// return view('ticket')-> with('trips', $trips) -> with('totalprice', $totalprice) ->with('route_id', $route_id)->with('bus_company_name', $bus_company_name)->with('point', $point)->with('tickets', $tickets);

        return view('ticket')-> with('trips', $trips) ->with('route_id', $route_id)->with('bus_company_name', $bus_company_name)->with('point', $point)->with('tickets', $tickets);
    }


     public function home()
    {
        return redirect ('/home');
    }

    //SHOW BACK TICKET 
    public function showticket(Request $request, $ticket_id)
    {
        // $tickets=Ticket::find($request -> ticket_id);
        // $ticket_id=$request -> ticket_id;
        
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

        return view('ticket')-> with('trips', $trips) ->with('route_id', $route_id)->with('bus_company_name', $bus_company_name)->with('point', $point)->with('tickets', $tickets);
    



// //CHECK UPCOMING SCHEDULE FOR CUSTOMER
//     public function show()
//     {
//         $user_id = Auth::user()-> user_id;
//         $ticket=Ticket::where('user_id',$user_id)->get();

//         return view('schedule')->with('ticket', $ticket);
//     }


    }


   
    

    
   
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        //
    }
}
