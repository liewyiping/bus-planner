<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;

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
        // return view('home');

        $role = auth()->user()->role;
        switch ($role) {
            case 'operator':
                    return view('operator-dashboard');
                break;
            case 'customer':
                    return view('home');
                break; 

        }

    }
}
