<?php

namespace  busplannersystem\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

    	return view('pages.index');
    }
}
