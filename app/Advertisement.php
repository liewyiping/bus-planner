<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon;

class Advertisement extends Model
{
    
protected $primaryKey="advertisement_id";

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
    $datetime_start= Carbon::parse($request -> input('datetime_start'));
    $datettime_end=Carbon::parse( $request -> input('datetime_end')); 
//     $datetime_start= $request -> input('datetime_start');
//    $datettime_end= $request -> input('datetime_end'); 
    
    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$datetime_start);
    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$datettime_end);



    $to = $datetime_start;
    $from =$datettime_end;
    // $duration = $to->diffInHours($from);
    $duration = $to->diffInHours($from);

        //Create a new application
     $advertisements = new Advertisement();
     $advertisements -> company_name = $request -> input('company_name');
     $advertisements -> datetime_start = $datetime_start;
     $advertisements -> datetime_end =  $datettime_end;
     $advertisements -> status = 'Pending';  
     $advertisements -> duration = $duration;
     $advertisements -> banner_image_ads = $resumeWithExt;
     $advertisements -> banner_image_ads_link = $resumefileNameToStore;   
     $advertisements -> save();

    

}


}
