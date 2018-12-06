<?php

namespace busplannersystem\Http\Controllers;

use busplannersystem\Advertisement;
use Illuminate\Http\Request;
use busplannersystem\Company;
use Carbon;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $advertisements=Advertisement::all();
        $companies= Company::all();

        return view('admin.insert-ads-info')->with('companies',$companies)->with('advertisements',$advertisements);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            'company_name' => 'required|string|max:255',
            'datetime_start'=> 'required|string|',
            'datetime_end'=> 'required|string|',          
            'banner_image_ads' => 'required|file|max:1999',

        ]);

        $advertisement = new Advertisement();
        $advertisement->create($request);
        return redirect('admin/insert-ads-info');

    }

    /**
     * Display the specified resource.
     *
     * @param  \busplannersystem\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \busplannersystem\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \busplannersystem\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {   
        $ads_count=Advertisement::all()->count();
        // $pending_ads=Advertisement::where('status','Pending')->orderBy('datetime_start', 'desc')->get(); //Get list of pending advertisements request
        $pending_ads=Advertisement::where('status','Pending')->orderBy('datetime_start')->get(); //Get list of pending advertisements request based on datetime_start
      
        

        $pending_ads_count=$pending_ads->count();
        $active_ad=Advertisement::where('status','Active')->get(); //Get the object that is Active
        $active_ad_count=$active_ad->count();
        $currentDayTime = Carbon::now('Asia/Kuala_Lumpur');
        $currentDayTime =$currentDayTime->toDateTimeString();  
       

    if($pending_ads_count!=0){
    
        if($active_ad_count!=0){ //if active ad is present, check currentdate >= datetime_end
            foreach($active_ad as $ad){
                if($currentDayTime>=($ad->datetime_end)){
                    //if current day time is more and equal than datetime end, the ads will be removed/replaced. Will change status to ended.
                    $banner_image_ads_link='empty.png';
                    $ad->status='Ended';
                    $ad->save();
                    
                foreach($pending_ads as $pending_ad){
                        //active ad is removed and currently checking whether theres a next ad that matches current day time.
                        
                        if($currentDayTime>=($pending_ad->datetime_start)){
                            $banner_image_ads_link = $pending_ad->banner_image_ads_link;
                            $pending_ad->status='Active';
                            $pending_ad->save();
                        }
                    }
                        
                   return view('admin.testing-ads')->with('banner_image_ads_link',$banner_image_ads_link);
                }

                else{
                    //if active ad is removed and theres no pending ad that matches the current day time
                    $banner_image_ads_link=$ad->banner_image_ads_link;                  
                    return view('admin.testing-ads')->with('banner_image_ads_link',$banner_image_ads_link);
                }
            }
        }
        else{
            //if number of active ad is 0 (no active ad currently). Will check pending ad. SAME CODE IN LINE 114.

        
            foreach($pending_ads as $pending_ad){
                
                if($currentDayTime>=($pending_ad->datetime_start)){
                    
                    $banner_image_ads_link = $pending_ad->banner_image_ads_link;
                    $pending_ad->status='Active';
                    $pending_ad->save();
                    return view('admin.testing-ads')->with('banner_image_ads_link',$banner_image_ads_link); 
                }
            }
        }

        
        
    }

    else{
    
    $banner_image_ads_link='empty.png';
    return view('admin.testing-ads')->with('banner_image_ads_link',$banner_image_ads_link); 


    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \busplannersystem\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }
}