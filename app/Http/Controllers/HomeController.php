<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;
use busplannersystem\Trip;

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
                    return view('operator-dashboard');
                break;
            case 'customer':
                    $trips = Trip::all();
                    return view('home')->with('trips',$trips);
                break;
            case 'admin':
                return view('admin');
            break;  

        }

    }
}
