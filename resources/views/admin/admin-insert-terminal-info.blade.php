@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Insert Route Info</div>
            


            <div class="card-body">
                    <form method="POST" action="{{ route('operator.insertRouteInfo.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="terminal_station" class="col-md-4 col-form-label text-md-right">{{ __('Terminal') }}</label>

                            <div class="col-md-6">
                                <input id="terminal_station" type="text" class="form-control{{ $errors->has('terminal_station') ? ' is-invalid' : '' }}" name="terminal_station" value="{{ old('terminal_station') }}" required autofocus>

                                @if ($errors->has('terminal_station'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terminal_station') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="terminal_area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <input id="terminal_area" type="text" class="form-control{{ $errors->has('terminal_area') ? ' is-invalid' : '' }}" name="terminal_area" value="{{ old('terminal_area') }}" required autofocus>

                                @if ($errors->has('terminal_area'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terminal_area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="terminal_city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="terminal_city" type="text" class="form-control{{ $errors->has('terminal_city') ? ' is-invalid' : '' }}" name="terminal_city" value="{{ old('terminal_city') }}" required autofocus>

                                @if ($errors->has('terminal_city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terminal_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="terminal_states" class="col-md-4 col-form-label text-md-right">{{ __('States') }}</label>

                            <div class="col-md-6">
                                <input id="terminal_states" type="text" class="form-control{{ $errors->has('terminal_states') ? ' is-invalid' : '' }}" name="terminal_states" value="{{ old('terminal_states') }}" required autofocus>

                                @if ($errors->has('terminal_states'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terminal_states') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        


         
   
                        
                        


                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Insert a new ') }}
                                </button>
                            </div>
                        </div>
                        <hr>

                                       
         <table class="table table-striped">

<thead>
    <tr>
    <th scope="col">Terminal</th>
    <th scope="col">Area</th>
    <th scope="col">City</th>
    <th scope="col">States</th>
    <th scope="col">Created at</th>


          </tr>
</thead>
                        <tbody>
                        @if( ! $terminals->isEmpty() )
                        @foreach($terminals as $terminal)
                        <tr>
                        <th scope="row">{{$terminal->id}}</th>
                        <td> {{$terminal->terminal_station}}</td>               
                        <td>{{$terminal->terminal_area}}</td>
                        <td>{{$terminal->terminal_city}}</td>                       
                        <td>{{$terminal->terminal_states}} </td>
                        <td> {{$terminal->created_at}}</td>

                        </tr>
                        @endforeach

                        </tbody>
                        </table>



                        @else

                        <p> Tiada cadangan terminal telah dijumpai </p>

                        @endif




                      

                        
                        

                         

                        

                       
                
            </div>

             




        </div>
    </div>



</div>

  


@endsection