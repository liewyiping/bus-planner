<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use busplannersystem\Ticket;

class LaravelGoogleGraph extends Controller
{
    function index()
    {
     $data = DB::table('tickets')
       ->select(
        DB::raw('company_name as company_name'),
        DB::raw('count(*) as number'))
       ->groupBy('company_name')
       ->get();
     $array[] = ['Company', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->company_name, $value->number];
     }
     return view('analytics.google_pie_chart')->with('company_name', json_encode($array));
    }

    ////////////////////line chart part ///////////////////////////////////////////////////////
    function index_popular_date_line_chart()
    {
        $ticket = DB::table('tickets')
                    ->select(
                        DB::raw("(DATE_FORMAT(date_depart,'%M, %Y')) as date"),
                        DB::raw("sum(pax_num) as number"))
                    ->groupBy(DB::raw("YEAR(date_depart)"), DB::raw("MONTH(date_depart)"))
                    ->get();
                    
        $result[] = ['Month','Number'];
        foreach ($ticket as $key => $value) {
            $result[++$key] = [$value->date, $value->number];
        }

        return view('analytics.popular_date_line_chart')->with('popular_month', json_encode($result));
      }

    ////////////////////donut chart part ///////////////////////////////////////////////////////
    function index_popular_destination_donut_chart()
    {
      $ticket = DB::table('tickets')
                    ->select(
                        DB::raw("destination_terminal as destination"),
                        DB::raw("sum(pax_num) as number"))
                    ->groupBy("destination")
                    ->get();
                    
        $result[] = ['Destination','Number'];
        foreach ($ticket as $key => $value) {
            $result[++$key] = [$value->destination, $value->number];
        }

        return view('analytics.popular_destination_donut_chart')->with('popular_destination', json_encode($result));
      }

}