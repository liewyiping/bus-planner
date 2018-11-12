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

            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company_name' => 'required|string|max:255',
            'operator_resume' => 'required|file|max:1999',
            'operator_license' => 'required|file|max:1999',

           


        ]);

      

                //Handle resume upload
                if($request->hasFile('operator_resume'))
        
                {
        
                    $resumeWithExt=$request -> file('operator_resume')->getClientOriginalName();
        
                // Get the full file name
                    $resumefilename = pathinfo($resumeWithExt,PATHINFO_FILENAME);            
        
                //Get the extension file name
                    $resumeextension = $request ->file('operator_resume')-> getClientOriginalExtension();
                //File name to store
                $resumefileNameToStore=$resumefilename.'_'.time().'.'.$resumeextension;
                
                //Upload Pdf file
                $path =$request ->file('operator_resume')->storeAs('public/operator_resume',$resumefileNameToStore);
                
                }
                    else{
                        $resumefileNameToStore = 'noPDF.pdf';
                    }

                //Handle license upload
                    if($request->hasFile('operator_license'))
        
                    {
            
                        $licenseWithExt=$request -> file('operator_license')->getClientOriginalName();
            
                    // Get the full file name
                        $licensefilename = pathinfo($licenseWithExt,PATHINFO_FILENAME);            
            
                    //Get the extension file name
                        $licenseextension = $request ->file('operator_license')-> getClientOriginalExtension();
                    //File name to store
                    $licensefileNameToStore=$licensefilename.'_'.time().'.'.$licenseextension;
                    
                    //Upload Pdf file
                    $path =$request ->file('operator_license')->storeAs('public/operator_license',$licensefileNameToStore);
                    
                    }
                        else{
                            $licensefileNameToStore = 'noPDF.pdf';
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

            return redirect('/');

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
