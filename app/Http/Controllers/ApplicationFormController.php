<?php

namespace busplannersystem\Http\Controllers;

use busplannersystem\ApplicationForm;
use Illuminate\Http\Request;
use busplannersystem\User;
use busplannersystem\Operator;
use Illuminate\Support\Facades\Hash;


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

    public function create_operator(Request $request,$id)
    {   
      

        switch($request->submitbutton){
            case'approve':
            //Create a new user
            $user= new User();
            $user->name = $request -> input('operator_name');
            $user->email = $request -> input('operator_email');
            $user->role = 'operator';
            $user->password= Hash::make($request -> input('password'));
            $user->save();

            //Change status of approval to Approved
            $application_forms=ApplicationForm::find($id);
            $application_forms->status='Approved';
            $application_forms->save();

            //Create new operator information
            $operators= new Operator();
            $operators->user_id_operators = $user->user_id;
            $operators->applicationform_id_operators = $application_forms->id;
            $operators->bus_company_id =  $request -> input('company_id');
            $operators->save();

            User::sendWelcomeEmail($user);

            //Reject operator and change status
            break;
            case'reject':
            $application_forms=ApplicationForm::find($id);
            $application_forms->status='Rejected';
            $application_forms->save();
            break;
        }
        
        //return redirect('/home');
        if(true) {
           $msg = [
                'message' => 'Data Added.',
               ];

           return redirect()->route('admin.viewApplicationForm')->with($msg);
        } else {
          $msg = [
               'error' => 'Some error!',
          ];
          return redirect()->route('admin.viewApplicationForm')->with($msg);
        }

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
            'company_id' => 'required|string|max:255',
            'operator_resume' => 'required|file|max:1999',
            'operator_license' => 'required|file|max:1999',

        ]);

        $application_forms = new ApplicationForm();
        $application_forms->create($request);
        // return redirect('/');

        if(true) {
           $msg = [
                'message' => 'Thank you for joining us!',
               ];

           return redirect()->route('login')->with($msg);
        } else {
          $msg = [
               'error' => 'Some error!',
          ];
          return redirect()->route('login')->with($msg);
        }

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
        
            $application_forms = ApplicationForm::whereIn("status",["Approved","Rejected"])-> get();
            return view ('admin.list-of-operators')->with('application_forms',$application_forms);
        // return  view('admin.list-of-operators');
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
