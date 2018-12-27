<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApplicationForm extends Model
{
    

    protected $fillable = [
        'name', 'email' , 'file_link' ,'company_name', 'operator_resume','operator_license',
 
 
    ];
 
    protected $table = 'application_forms';

    public function create(Request $request){

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
     $application_forms -> company_id = $request -> input('company_id');          
     $application_forms -> operator_resume = $resumeWithExt;
     $application_forms -> operator_resume_link = $resumefileNameToStore;
     $application_forms -> operator_license =  $licenseWithExt;
     $application_forms -> operator_license_link = $licensefileNameToStore;
     $application_forms -> status = "NEW";  
     $application_forms -> save();
     
    }
 

    public function user(){

        return $this->belongsTo('busplannersystem\User');

    }

    






}
