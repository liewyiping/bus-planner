<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Charts\FinancialChart;
use busplannersystem\Ticket;
use busplannersystem\Company;
use busplannersystem\Trip;
use busplannersystem\Bus;
use busplannersystem\Operator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon;

class FinancialAnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id = Auth::user()->user_id;
        $operator_id = Operator::where('user_id_operators', '=', $user_id)->value('operator_id');
        $operator=Operator::find($operator_id);
        $bus_company_name=$operator->company->bus_company_name; 

        
        $sort_sums_years = Ticket::where('company_name', $bus_company_name)->select(
        DB::raw('sum(ticket_price) as sums'),DB::raw('sum(pax_num) as pax_num_total'),
        DB::raw("DATE_FORMAT(created_at,'%Y') as years")
        )->orderBy('created_at','asc')->groupBy('years')->get();   
       
        $sorted_tickets=$sort_sums_years->pluck('sums');     
        
       
        $chart = new FinancialChart();       
        $chart->labels($sort_sums_years->pluck('years')); 
        $chart->dataset('Revenue over the years', 'line',$sorted_tickets);
       
        return view('operator-views.financial-analytics')->with('chart',$chart)->with('sort_sum_years',$sort_sums_years)->with('bus_company_name',$bus_company_name);
       
    }

    public function years_report()
    {   
         
       
       

    }

    public function annual_report(Request $request)
    {   

        $this->validate($request,[

           
            'year_report' => 'required|integer|min:2000',
            

        ]);

        $year_report= $request -> input('year_report');

        $user_id = Auth::user()->user_id;
        $operator_id = Operator::where('user_id_operators', '=', $user_id)->value('operator_id');
        $operator=Operator::find($operator_id);
        $bus_company_name=$operator->company->bus_company_name; //get the company name of the bus using eloquent orm yang kita dah set dalam model operator

        //Nak sort sums of ticket_price by months so dalam ni ada dua attribute (sums,months)
        $sort_sums_months = Ticket::where('company_name', $bus_company_name)->whereYear('created_at', '=', $year_report)->select(
        DB::raw('sum(ticket_price) as sums'), 
        DB::raw("DATE_FORMAT(created_at,'%M') as months"), DB::raw('sum(pax_num) as pax_num_total')
        )->orderBy('created_at','asc')->groupBy('months')->get();

        $total_revenue_year =$sort_sums_months->sum('sums'); //get total revenue annually
        $total_seat_sold =$sort_sums_months->sum('pax_num_total'); //get total seat sold annually
        
        //When dah sorted, kita nak value sums yang dah sorted tadi based on months so kat sini kita just pluck 'sums'
        //pluck ni ialah dia akan return array which precisely what we want to render the chart
        $sorted_tickets=$sort_sums_months->pluck('sums');
        
        //Find number of unsold tickets
        $bus_company_id=$operator->bus_company_id;
        $operators_id=Operator::where('bus_company_id',$bus_company_id)->pluck('operator_id'); //get array of operators_id from the same company
        $buses_id=Bus::whereIn('operator_id',$operators_id)->pluck('bus_id'); //Get array of bus_id

        $trips = DB::table('trips')->whereIn('bus_id',$buses_id)->whereYear('date_depart', $year_report)->select(
            DB::raw('count(trip_id) as total_trip'), 
            DB::raw("DATE_FORMAT(date_depart,'%M') as months")
            )->orderBy('date_depart','asc')->groupBy('months')->get(); //get total_trips in each months and sort by months
                

            // for ($y = 0; $y < isset($trips->count); $y++) {
            // $sort_sums_months[$y]->total_trip=$trips[$y]->total_trip;
            // }
            
            //insert total trip by month into $sort_sum_months to pass it to view
            for ($y = 0; $y < $trips->count(); $y++) {
                $sort_sums_months[$y]->total_trip=$trips[$y]->total_trip;
                }
            
        
    

            $trips_months = Trip::whereIn('bus_id',$buses_id)->whereYear('date_depart', $year_report)->select(
                DB::raw('(trip_id) as trip_id'), 
                DB::raw("DATE_FORMAT(date_depart,'%M') as months")
                )->orderBy('date_depart','asc')->get();

            
           
            $total_seat_months = DB::table('trips')->whereYear('date_depart', $year_report)
            ->join('buses', 'trips.bus_id', '=', 'buses.bus_id')
            ->whereIn('trips.bus_id', $buses_id)
            ->select('trips.*', 'buses.total_seat')->select(
                DB::raw('sum(total_seat) as total_seat'), 
                DB::raw("DATE_FORMAT(date_depart,'%M') as months")
                )->orderBy('date_depart','asc')->groupBy('months')->get();

       
            //Finding the tickets id that sold before depart_date by months
            $tickets =DB::table('tickets')->where('company_name', $bus_company_name)->whereYear('date_depart', '=', $year_report)->select(
            DB::raw('(ticket_id) as ticket_id') , DB::raw('CONCAT(date_depart, " ", time_depart) as datetime_depart'),DB::raw('(created_at) as created_at')
            )->get();

            
            
            
            //Comparing ticket that was created based on attribute created_at must beearlier than datetime_depart
            $A=0;
            for ($x = 0; $x < $tickets->count(); $x++) {
                
                if(($tickets[$x]->created_at)<=($tickets[$x]->datetime_depart))
                    {
                        $tickets[$A]->sold_trip_id=$tickets[$x]->ticket_id;
                        $A=$A+1;
                       
                    }
                }
                
                $sold_tickets=$tickets->pluck('sold_trip_id'); //get array ticket_id that was sold before datetime_depart
                $total_pax_num_months =Ticket::whereIn('ticket_id', $sold_tickets)->select(
                DB::raw('sum(pax_num) as pax_num') ,DB::raw("DATE_FORMAT(date_depart,'%M') as months")
                )->orderBy('date_depart','asc')->groupBy('months')->get(); //get the total_seat for each months based on ticket_id by the company 
                
                // for ($x = 0; $x <$total_seat_months->count(); $x++) {
                //     $sort_sums_months[$x]->unsold_ticket_month=($total_seat_months[$x]->total_seat)-($total_pax_num_months[$x]->pax_num);
               
                //     }
                
                //Insert unsold tickets in $sort_sum_months for blade view by substracting total_seat in that month to the total pax_num in that month
                for ($x = 0; $x <$total_pax_num_months->count(); $x++) {
                        $sort_sums_months[$x]->unsold_ticket_month=($total_seat_months[$x]->total_seat)-($total_pax_num_months[$x]->pax_num);
                   
                        }

                

                //Work in progress
                
                $total_seat_year=$total_seat_months->sum('total_seat'); //Find advertised total seat
                $total_pax_num_year=$total_pax_num_months->sum('pax_num'); //Find number of pax that were sold
                $unsold_ticket_year=$total_seat_year - $total_pax_num_year; 

                $total_trips=$trips->sum('total_trip'); //Find total trip annually

       

        //Create a new chart
        $chart = new FinancialChart();
        $chart->labels($sort_sums_months->pluck('months')); //Either way sama je but this one json dah tolong sort so we can use the attribute
        $chart->dataset('Annual financial report', 'line',$sorted_tickets);
        

        return view('operator-views.annual-financial-report')->with('chart',$chart)->with('year_report',$year_report)->with('total_revenue_year',$total_revenue_year)
        ->with('total_seat_sold',$total_seat_sold)->with('sort_sum_months',$sort_sums_months)->with('bus_company_name',$bus_company_name)->with('total_trips',$total_trips)->with('unsold_ticket_year',$unsold_ticket_year)->with('trips_months', $trips_months );
       
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
