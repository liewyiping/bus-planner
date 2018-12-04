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
        $companies= Company::all();

        return view('admin.insert-ads-info')->with('companies',$companies);
        
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
        $pending_ads=Advertisement::where('status','Pending')->get();
        $pending_ads_count=$pending_ads->count();
        $active_ad=Advertisement::where('status','Active')->get();
        $active_ad_count=$active_ad->count();

    while($pending_ads_count!==0)

    {

        if($active_ad_count==0){

            foreach($pending_ads as $pending_ad){

                //if($pending_ad->)


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
            



        // }
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
