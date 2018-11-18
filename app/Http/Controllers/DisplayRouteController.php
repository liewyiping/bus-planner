<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DisplayRouteController extends Controller
{
    function index()
    {
    	$route_list = DB::table('routes')->groupBy('origin')->get();

    	return view('index')->with('route_list', $route_list);
    }

    function fetch(Request $request)
    {
    	$select = $request->get('select');
    	$value = $request->get('value');
    	$dependent = $request->get('dependent');
    	$data = DB::table('routes')->where($select, $value)->groupBy($dependent)->get();
    	$output = '<option value="">Select '.ucfirst($dependent).'</option>';

    	foreach ($data as $row) 
    	{
    		$output .='<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
    	}
    	echo $output;
    }
}
