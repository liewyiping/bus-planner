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
        $application_forms = ApplicationForm::where("status","NEW")-> get();
        return view ('admin.view-new-applications')->with('application_forms',$application_forms)->withMessage('User approved successfully');
    }

    public function approval()
    {
        return view('approval');
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

        $application_forms = new ApplicationForm();
        $application_forms->create($request);
        return redirect('/');

    }


    /**
     * Display the specified resource.
     *
     * @param  \busplannersystem\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $application_forms= ApplicationForm::find($id);

        return  view('admin.approve-new-application')->with('application_forms',$application_forms);
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
