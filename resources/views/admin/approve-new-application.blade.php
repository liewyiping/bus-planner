@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Approving application form </div>

            <div class="card-body">

                         <form method="POST" action="{{ route('admin.createOperator',['application_forms' => $application_forms->id])}}" >

                        @csrf
                    
                        @if ($message = Session::get('success'))
                          <div class="alert alert-success">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif
                        @if ($message = Session::get('warning'))
                          <div class="alert alert-warning">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif
                        

                         <div class="form-group row">
                            <label for="operator_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                               
                                <input id="operator_name" type="text" value="{{ @$application_forms['name'] }}"  class="form-control" name="operator_name"  required autofocus readonly>
                               
                            </div>
                        </div>
                            

                        <div class="form-group row">
                            <label for="operator_email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="operator_email" type="text"  value="{{ @$application_forms['email']}}" class="form-control" name="operator_email"  required autofocus readonly>

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('Company ID') }}</label>

                            <div class="col-md-6">
                                <input id="company_id" type="text"  value="{{ @$application_forms['company_id']}}" class="form-control" name="company_id"  required autofocus readonly>

                               
                            </div>
                        </div>
                  

                        <div class="form-group row">
                            <label for="created_at" class="col-md-4 col-form-label text-md-right">{{ __('Date received') }}</label>

                            <div class="col-md-6">
                                <input id="created_at" type="text" value="{{ @$application_forms['created_at']}}" class="form-control" name="created_at"  required autofocus readonly>

                               
                            </div>
                        </div>



                              
                             
                        <div class="form-group row">
                             <label for="operator_resume" class="col-md-4 col-form-label text-md-right">{{ __('Resume(PDF)') }}</label>

                                <div class="col-md-6">                       
                                                    
                               
                               
                               
                                <a href ="<?php echo asset("storage/operator_resume/$application_forms->operator_resume_link")?>">{{ basename(@$application_forms[operator_resume]) }} </a>
                                </div>
                                
                        </div>

                          <div class="form-group row">
                             <label for="file_link" class="col-md-4 col-form-label text-md-right">{{ __('License(PDF)') }}</label>
                                <div class="col-md-6">                 
                                <a href ="<?php echo asset("storage/operator_license/$application_forms->operator_license_link")?>">{{ basename(@$application_forms[operator_license]) }} </a>
                                </div>
                                
                         </div>

                           <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> -->
                                
              
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                            <button type="submit" class="btn btn-success" value="approve" name="submitbutton" >
                                {{ __('Register Operator') }}
                            </button>
                            <button type="submit" class="btn btn-danger" value="reject" name="submitbutton" >
                                {{ __('Reject operator') }}
                            </button>
                            </div>
                        </div>

                         <hr style="border-color:white;">
                        

                       
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- @if($errors->any())
        <div class="row collapse">
            <ul class="alert-box warning radius">
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif -->