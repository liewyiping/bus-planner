<?php

namespace busplannersystem\Http\Controllers;

use busplannersystem\ApplicationForm;
use Illuminate\Http\Request;

class ApplicationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator-application-form');
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

            'name' => 'required|string|max:20',
            'email' => 'required|email|max:20',
            'company_name' => 'required|string|max:20',
            'operator_resume' => 'required|file|max:1999',
            'operator_license' => 'required|file|max:1999',

           


        ]);

        //Handle file upload
        if($request->hasFile('operator_resume'||'operator_license'))
        
        {

            $resumeWithExt=$request -> file('operator_resume')->getClientOriginalName();
            $licenseWithExt=$request -> file('operator_license')->getClientOriginalName();

        // Get the full file name
            $resumefilename = pathinfo($resumefilename,PATHINFO_FILENAME); 
            $licensefilename= pathinfo($licensefilename,PATHINFO_FILENAME);     

        //Get the extension file name
            $resumeextension = $request ->file('operator_resume')-> getClientOriginalExtension();
            $licenseextension = $request ->file('operator_license')-> getClientOriginalExtension();


        //File name to store
        $resumefileNameToStore=$resumefilename.'_'.time().'.'.$resumeextension;
        $licensefileNameToStore=$licensefilename.'_'.time().'.'.$licenseextension;
        
        //Upload Pdf file
        $resumepath =$request ->file('operator_resume')->storeAs('public/operator_resume',$resumefileNameToStore);
        $licensepath =$request ->file('operator_license')->storeAs('public/operator_license',$licensefileNameToStore);

        
        }
            else{
                $fileNameToStore = 'noPDF.pdf';
            }
            

        


        //Create a new application

        
       
            
            $application_forms = new ApplicationForm();
            $application_forms -> name = $request -> input('name');
            $application_forms -> email = $request -> input('email');
            $application_forms -> company_name = $request -> input('company_name');          
            $application_forms -> operator_resume = $resumeWithExt;
            $application_forms -> operator_resume_link = $resumefileNameToStore;
            $application_forms -> operator_license =  $licenseWithExt;
            $application_forms -> operator_license_link = $licensefileNameToStore;  
          
            

            $application_forms -> save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \busplannersystem\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \busplannersystem\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \busplannersystem\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \busplannersystem\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationForm $applicationForm)
    {
        //
    }
}
