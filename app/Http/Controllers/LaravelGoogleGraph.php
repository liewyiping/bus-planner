<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
}