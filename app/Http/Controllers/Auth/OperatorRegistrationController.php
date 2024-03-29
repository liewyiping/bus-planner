<?php

namespace busplannersystem\Http\Controllers\Auth;
use busplannersystem\Operator;
use busplannersystem\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use DB;


class OperatorRegistrationController extends Controller
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

        $company_list = DB::table('companies')->get();
        return view('auth.operator-registration')->with('company_list', $company_list);

    }

  public function register(Request $request)
    {

       //Validates data
        $this->validator($request->all())->validate();

       //Create operator
        $operator = $this->create($request->all());

        //Authenticates operator
        //$this->guard()->login($operator);

       //Redirects operator
        return redirect('/operator/login');
    }


   
     
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:operators',
            'license_number'=> 'required|string|max:23',
            'bus_company_id' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    
    protected function create(array $data)
    {
        return Operator::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'license_number'=> $data['license_number'],
            'bus_company_id' => $data['bus_company_id'],
            'password' => Hash::make($data['password']),
        ]);
    }

    //Get the guard to authenticate Seller
   //protected function guard()
   //{
       //return Auth::guard('operator');
   //}

}
