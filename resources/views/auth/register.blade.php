<style type="text/css">
    #ifYes, #ifNo { display: none;}
    #operator:checked ~ #ifYes {display: block;} 
    #customer:checked ~ #ifNo {display: block;}
</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
                            <label for="role" class="col-md-4 text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                Customer <input type="radio" name="role" id="customer" value="customer"> &nbsp;&nbsp;
                                Operator <input type="radio" name="role" id="operator" value="operator">
                        
                                <div id="ifYes">
                                    <div class="row">
                                        <label for="licence_number" class="col-form-label">{{ __('Licence Number') }}</label>

                                        <div class="col-md-6">
                                            <input id="licence_number" type="licence_number" class="form-control{{ $errors->has('licence_number') ? ' is-invalid' : '' }}" name="licence_number" required>

                                                @if ($errors->has('licence_number'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('licence_number') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div> <br>

                                    <div class="row">
                                        <label for="company_name" class="col-form-label">{{ __('Company Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="company_name" type="company_name" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" required>

                                                @if ($errors->has('company_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('company_name') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
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

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
