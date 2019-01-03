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
                    
                    <h5 align="center"><strong>Insert Driver</strong></h5>
                </div>

                <div class="card-body">
                   
                    <form method="POST" action="{{ route('operator.insert-driver.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="driver_name" class="col-md-4 col-form-label text-md-right">{{ __('Driver Name') }}</label>

                            <div class="col-md-6">
                                <input id="driver_name" type="text" class="form-control{{ $errors->has('driver_name') ? ' is-invalid' : '' }}" name="driver_name" value="{{ old('driver_name') }}" required autofocus>

                                @if ($errors->has('driver_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('driver_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="driver_ic" class="col-md-4 col-form-label text-md-right">{{ __('IC Number') }}</label>

                            <div class="col-md-6">
                                <input id="driver_ic" type="text" class="form-control{{ $errors->has('driver_ic') ? ' is-invalid' : '' }}" name="driver_ic" value="{{ old('driver_ic') }}" required autofocus>

                                @if ($errors->has('driver_ic'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('driver_ic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="driver_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="driver_email" type="driver_email" class="form-control{{ $errors->has('driver_email') ? ' is-invalid' : '' }}" name="driver_email" value="{{ old('driver_email') }}" required>

                                @if ($errors->has('driver_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('driver_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="driver_address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="driver_address" type="driver_address" class="form-control{{ $errors->has('driver_address') ? ' is-invalid' : '' }}" name="driver_address" value="{{ old('driver_address') }}" required>

                                @if ($errors->has('driver_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('driver_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                        <br>
                        <table class="table table-striped">

<thead>
    <tr>
    <th scope="col">Driver ID</th>  
    <th scope="col">Driver Name</th>
    <th scope="col">IC Number</th>
    <th scope="col">Driver Email</th>
    <th scope="col">Address</th>
  
                        </tr>
                    </thead>
                    <tbody>
                    @if( ! $drivers->isEmpty() )
                    @foreach($drivers as $driver)
                    <tr>
                    <th scope="row">{{$driver->driver_id}}</th> 
                    <td>{{$driver->driver_name}}</td>   
                    <td>{{$driver->driver_ic}}</td>
                    <td>{{$driver->driver_email}}</td>
                    <td>{{$driver->driver_address}}</td>
                    
                   
                  
                  

                    </tr>
                    @endforeach

                    </tbody>
                    </table>



                    @else

                    <p> No trips were found </p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
