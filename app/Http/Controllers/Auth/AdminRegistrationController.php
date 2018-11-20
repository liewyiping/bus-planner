<?php

namespace busplannersystem\Http\Controllers\Auth;
use busplannersystem\Admin;
use busplannersystem\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use DB;


class AdminRegistrationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function showRegistrationForm(){
        return view('auth.admin-registration');

    }

  public function register(Request $request)
    {

       //Validates data
        $this->validator($request->all())->validate();

       //Create operator
        $admin = $this->create($request->all());

        //Authenticates operator
        //$this->guard()->login($operator);

       //Redirects operator
        return redirect('/admin/login');
    }


   
     
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'job_title'=> 'required|string|max:50',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'job_title'=> $data['job_title'],
            'password' => Hash::make($data['password']),
        ]);
    }

    //Get the guard to authenticate Seller
   //protected function guard()
   //{
       //return Auth::guard('operator');
   //}

}
