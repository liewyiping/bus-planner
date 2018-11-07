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
        return view('operator-application-form');
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
        //
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
