<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Seat;
use busplannersystem\Operator;
use busplannersystem\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth()->user()->role;
        switch ($role) {
            case 'operator':
                        $user_id = auth()->user()->user_id;
                        $operator_id = Operator::where('user_id_operators', '=', $user_id)->value('operator_id');
                        $bus_company_id = Operator::where('user_id_operators', '=', $user_id)->value('bus_company_id');
                        $company_id = Company::where('bus_company_id', '=', $bus_company_id)->value('bus_company_id');
                        $company_name = Company::where('bus_company_id', '=', $bus_company_id)->value('bus_company_name');
                        $company_address = Company::where('bus_company_id', '=', $bus_company_id)->value('bus_company_address');
                    return view('operator-dashboard')->with('operator_id',$operator_id)->with('bus_company_id',$bus_company_id)
                    ->with('company_id',$company_id)->with('company_name',$company_name)->with('company_address',$company_address);
                break;
            case 'customer':
                    $seats = Seat::all();
                    return view('home')->with('seats',$seats);
                break;
            case 'admin':
                return view('admin');
            break;  

        }

    }

    public function operator_report()
    {
        return view ('operator-views.operator-view-report');
    }
}
