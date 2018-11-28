@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/home') }}">
                        <input type="button" class="btn btn-primary" value="Back"/>
                    </a>
                    <a href="{{ url('/operator/view-bus-info') }}">
                        <input type="button" class="btn btn-primary" value="Bus info"/>
                    </a>
                    
                    <h5 align="center"><strong>Insert Bus Information</strong></h5>
                </div>

            <div class="card-body">
                    <form method="POST" action="{{ route('operator.insertBusInfo.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="registration_plate" class="col-md-4 col-form-label text-md-right">{{ __('Registration plate') }}</label>

                            <div class="col-md-6">
                                <input id="registration_plate" type="text" class="form-control{{ $errors->has('registration_plate') ? ' is-invalid' : '' }}" name="registration_plate" value="{{ old('registration_plate') }}" required autofocus>

                                @if ($errors->has('registration_plate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('registration_plate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="total_seat" class="col-md-4 col-form-label text-md-right">{{ __('Total number of seat') }}</label>

                            <div class="col-md-6">
                                <input id="total_seat" type="number" class="form-control{{ $errors->has('total_seat') ? ' is-invalid' : '' }}" name="total_seat" value="{{ old('total_seat') }}" required autofocus>

                                @if ($errors->has('total_seat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('total_seat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="bus_layout" class="col-md-4 col-form-label text-md-right">{{ __('Coach Type') }}</label>

                             <div class="col-md-6">
                            <select class="form-control" name='bus_layout' id='bus_layout'>
                                
                                <option value=#>Please choose</option>
                                <option value='A'>SVIP = 2(R)+2(L)</option>
                                <option value='B'>Executive = 2(R)+1(L) </option>
                              
                            </select>
                            </div>

                         
                        </div>

                        

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                               
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Insert a new bus') }}
                                </button>

                                <!-- <a href="{{ url('/operator/view-bus-info') }}" class="active" class="btn btn-primary">View</a> -->

                                <!-- <a href="{{ url('/operator/view-bus-info') }}">
                                    <input type="button" class="btn btn-primary" value="View Buses" />
                                    
                                </a> -->

                            </div>
                        </div>
                   
            </div>
        </div>
    </div>
</div>

@endsection