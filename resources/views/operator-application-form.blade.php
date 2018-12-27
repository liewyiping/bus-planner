@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/home') }}">
                    </a>
                    
                    <h5 align="center"><strong>Operator Application Form</strong></h5>
                </div>

                <div class="card-body">
                   
                    <form method="POST" action="{{ route('operator.application.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
                            <div class="col-md-6">
                            <select id="company_id" class="form-control{{ $errors->has('company_id') ? ' is-invalid' : '' }}" name="company_id" required>
                                <option value="">Select</option>
                                @foreach(busplannersystem\Company::all()->unique('bus_company_id') as $bus_company)
                                <option  class="option "value="{{ $bus_company->bus_company_id }}">{{$bus_company->bus_company_name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="operator_resume" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>

                            <div class="col-md-6">
                                <input id="operator_resume" type="file" class="form-control{{ $errors->has('operator_resume') ? ' is-invalid' : '' }}" name="operator_resume" value="{{ old('operator_resume') }}" required autofocus>

                                @if ($errors->has('operator_resume'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('operator_resume') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="operator_license" class="col-md-4 col-form-label text-md-right">{{ __('License File') }}</label>

                            <div class="col-md-6">
                                <input id="operator_license" type="file" class="form-control{{ $errors->has('operator_license') ? ' is-invalid' : '' }}" name="operator_license" value="{{ old('operator_license') }}" required autofocus>

                                @if ($errors->has('operator_license'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('operator_license') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sign up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
