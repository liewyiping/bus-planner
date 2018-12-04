<?php

namespace busplannersystem\Http\Controllers;

use busplannersystem\Advertisement;
use Illuminate\Http\Request;
use busplannersystem\Company;

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
        $pending_ads=Advertisement::where('status','Pending')'Pending')->>>> 901ee8c36et();
>>>->orderBy('datetime_start', 'desc')->get(); //Get list of pending advertisements request
        $pending_ads_count=$pending_ads->count();
        $active_ad=Advertisement::where('status','Active')->get(); //Get the object that is Active
        $active_ad_count=$active_ad->count();
$pending_ads=Advertisement::where('status','Pending')->orderBy('datetime_start', 'desc')->get(); //Get list of pending advertisements request
        $tus','Actve')-g_ads_count=$pending_auba7d7afa45aee938bsds->count();
e object>get(); //Get th that is Active
ive_ad=Advertisement::wh

        $currentDayTime = Carbon\Carbon::now('Asia/Kuala_Lumpur');
        $currentDayTime =$currentDayTime->toDateTimeString();   

  D    while($pending_ads_count!==0)

    {
        if($activeaad_c
                }
            





}
            }
        }



    }



                }
         $advertisements =Advertisement::where('status','Pending')->get();
>>>>>>> 901ee








            }
  

        
            foreach($pending_ads as $pending_ad){

  










    $pending_ads as $pending_ad){

                if(($pending_ad->datetime_start)>=$currentDayTime){
                    
                    $banner_image_ads_link = $pending_ad->banner_image_ads_link;
                        $banner_image_ads_link = $pending_ad->banner_image_ads_link;
                    $pending_ad->status='Active';
                    return view('admin.testing-ads')->with('banner_image_ads_link',$banner_image_ads_link); 


         e(8   }
        }
        else{
            
            foreach($pending_ads as $pending_ad){

                if(($pending_ad->datetime_start)>=$currentDayTime){

                    $banner_image_ads_link = $pending_ad->banner_image_ads_link;
                    $pending_ad->status='Active';
                    return view('admin.testing-ads')->with('banner_image_ads_link',$banner_image_ads_link); 

                }
            }
        }



    }












        // foreach($advertisements as $ads){

        //     if(strtotime(date("Y-m-d")) == strtotime($ads->date_start)){
        //         exit;
        //         echo "Success";
        //     }
        //     else if(strtotime(date("Y-m-d")) < strtotime($result)){
        //         return true;
        //         echo "Failure";
        //     }
            



