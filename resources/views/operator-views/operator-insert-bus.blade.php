@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Insert Bus Info</div>

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
                            <label for="total_seat" class="col-md-4 col-form-label text-md-right">{{ __('No of seats') }}</label>

                            <div class="col-md-6">
                                <input id="total_seat" type="text" class="form-control{{ $errors->has('total_seat') ? ' is-invalid' : '' }}" name="total_seat" value="{{ old('total_seat') }}" required autofocus>

                                @if ($errors->has('total_seat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('total_seat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="operator_id" class="col-md-4 col-form-label text-md-right">{{ __('Operator ID') }}</label>

                            <div class="col-md-6">
                                <input id="operator_id" type="text" class="form-control{{ $errors->has('operator_id') ? ' is-invalid' : '' }}" name="operator_id" value="{{ old('operator_id') }}" required autofocus>

                                @if ($errors->has('operator_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('operator_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                               
                                <button type="submit" class="btn btn-default">
                                    {{ __('Insert a new bus') }}
                                </button>

                                <!-- <a href="{{ url('/operator/view-bus-info') }}" class="active" class="btn btn-primary">View</a> -->

                                 <a href="{{ url('/operator/view-bus-info') }}">
                                    <input type="button" class="btn btn-primary" value="View Buses" />
                                    
                                  </a>

                            </div>
                        </div>
                   
            </div>
        </div>
    </div>
</div>

@endsection