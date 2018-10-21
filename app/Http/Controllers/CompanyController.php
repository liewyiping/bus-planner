<?php

namespace busplannersystem\Http\Controllers;
use busplannersystem\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response    
      */
    
 
     public function index()
     {
        $companies = Company::all();
         return view ('posts.admin-insert-bus-company')->with('companies',$companies);
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
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
 
             'busCompanyName' => 'required|string|max:25',
             
 
         ]);
 
         //Insert a new company 
             $companies = new Company();
            
             $companies -> busCompanyName = $request -> input('busCompanyName');
             
             $companies -> save();
 
             return redirect('admin/insert-bus-company');
 
 
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
 