<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Advertisement extends Model
{
    


public function create(Request $request){

    if($request->hasFile('banner_image_ads'))
        
    {

        $resumeWithExt=$request -> file('banner_image_ads')->getClientOriginalName();

    // Get the full file name
        $resumefilename = pathinfo($resumeWithExt,PATHINFO_FILENAME);            

    //Get the extension file name
        $resumeextension = $request ->file('banner_image_ads')-> getClientOriginalExtension();
    //File name to store
    $resumefileNameToStore=$resumefilename.'_'.time().'.'.$resumeextension;
    
    //Upload Pdf file
    $path =$request ->file('banner_image_ads')->storeAs('public/banner_image_ads',$resumefileNameToStore);
    
    }
        else{
            $resumefileNameToStore = 'noImage.png';
        }


        //Create a new application
     $advertisements = new Advertisement();
     $advertisements -> company_name = $request -> input('company_name');
     $advertisements -> date_start = $request -> input('date_start');
     $advertisements -> date_end = $request -> input('date_end'); 
     $advertisements -> ads_time_start = $request -> input('ads_time_start');          
     $advertisements -> ads_time_end = $request -> input('ads_time_end'); 
     $advertisements -> operator_resume = $resumeWithExt;
     $advertisements -> operator_resume_link = $resumefileNameToStore;
     $advertisements -> operator_license =  $licenseWithExt;
     $advertisements -> operator_license_link = $licensefileNameToStore;  
     $advertisements -> save();

    

}


}
