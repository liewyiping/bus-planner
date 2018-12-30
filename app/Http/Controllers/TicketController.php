<?php

namespace busplannersystem\Http\Controllers;
use busplannersystem\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
   

    public function index()
    {
        $tickets = Ticket::all();
        $tickets = Ticket::orderBy('tripID','desc')->get(); //susun tripID by descending order.
        return view ('posts.operator-insert-tickets-info')->with('tickets',$tickets);
    }

    public function index_customer()
    {
        $id = Auth::user()->user_id;
        $tickets = Ticket::all()->where('user_id', $id);
        return view ('customer-booking-record')->with('tickets',$tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showInsertTicketForm()
    {

        return view ('posts.operator-insert-tickets-info');       
        

    }
    


    public function create(array $data)
    {

           
        

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

            'company_name' => 'required|string|max:255',
            'busID'=> 'required|string|max:10',
            // 'origin_terminal' => 'required|string|max:255',
            // 'destination_terminal'=> 'required|string|max:255',
            'date_depart' => 'required|string|max:25',
            'time_depart'=> 'required|string|max:25',
            'ticket_price'=> 'required|string|max:8',

        ]);

        //Create a new ticket
            $tickets = new Ticket();
            $tickets -> company_name =         $request ->  input('company_name');
            $tickets -> busID =                $request ->  input('busID');
            // $tickets -> origin_terminal =      $request ->  input('origin_terminal');
            // $tickets -> destination_terminal = $request ->  input('destination_terminal');
            $tickets -> date_depart =          $request ->  input('date_depart');
            $tickets -> time_depart =          $request ->  input('time_depart');
            $tickets -> ticket_price =         $request ->  input('ticket_price');
            $tickets -> save();

            return redirect('operator/insert-tickets-info');


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

