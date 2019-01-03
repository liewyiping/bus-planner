<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use busplannersystem\Ticket;
use busplannersystem\Operator;
use Illuminate\Support\Facades\Auth;

class LaravelGoogleGraph extends Controller
{
    function index()
    {
     $data = DB::table('tickets')
       ->select(
        DB::raw('company_name as company_name'),
        DB::raw('count(*) as number'))
        ->orderBy('number','decs')
       ->groupBy('company_name')
       ->get();
     $array[] = ['Company', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->company_name, $value->number];
     }
     return view('analytics.google_pie_chart')->with('company_name', json_encode($array))->with('data',$data);
    }

    ////////////////////line chart part ///////////////////////////////////////////////////////
    function index_popular_date_line_chart()
    {
        $user_id = Auth::user()->user_id;
        $operator_id = Operator::where('user_id_operators', '=', $user_id)->value('operator_id');
        $operator=Operator::find($operator_id);
        $bus_company_name=$operator->company->bus_company_name; 

        $tickets = Ticket::where('company_name', $bus_company_name)->select(
                        DB::raw("(DATE_FORMAT(date_depart,'%M, %Y')) as date"),
                        DB::raw("sum(pax_num) as number"),
                        DB::raw('sum(ticket_price) as revenue'))
                        ->groupBy(DB::raw("YEAR(date_depart)"), DB::raw("MONTH(date_depart)"))
                        ->get();
                        
        $result[] = ['Month','Number'];
        foreach ($tickets as $key => $value) {
            $result[++$key] = [ $value->date,  $value->number];
        }

        $total_revenue = Ticket::where('company_name', $bus_company_name)->select(
            DB::raw("company_name as company_name"),
            DB::raw('sum(ticket_price) as revenue'))
            ->groupBy(DB::raw("company_name"))
            ->get();

        return view('analytics.popular_date_line_chart')->with('popular_month', json_encode($result))->with('tickets',$tickets)
        ->with('total_revenue',$total_revenue);
      }

    ////////////////////donut chart part ///////////////////////////////////////////////////////
    function index_popular_destination_donut_chart()
    {
        $user_id = Auth::user()->user_id;
        $operator_id = Operator::where('user_id_operators', '=', $user_id)->value('operator_id');
        $operator=Operator::find($operator_id);
        $bus_company_name=$operator->company->bus_company_name; 

      $tickets_destination = DB::table('tickets')
                    ->where('company_name', $bus_company_name)
                    ->select(
                        DB::raw("destination_terminal as destination"),
                        DB::raw("sum(pax_num) as number"),
                        DB::raw('sum(ticket_price) as revenue'))
                    ->orderBy('number','decs')
                    ->groupBy("destination")
                    ->get();
                    
        $result[] = ['Destination','Number'];
        foreach ($tickets_destination as $key => $value) {
            $result[++$key] = [$value->destination, $value->number];
        }

        $total_revenue = Ticket::where('company_name', $bus_company_name)->select(
            DB::raw("company_name as company_name"),
            DB::raw('sum(ticket_price) as revenue'))
            ->groupBy(DB::raw("company_name"))
            ->get();

        return view('analytics.popular_destination_donut_chart')->with('popular_destination', json_encode($result))->with('tickets_destination',$tickets_destination)
        ->with('total_revenue',$total_revenue);
      }

}