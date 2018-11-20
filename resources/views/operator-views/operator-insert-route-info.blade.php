@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Please insert your commonly used route</div>
            


            <div class="card-body">
                    {{--<form method="POST" action="{{ route('operator.insertRouteInfo.submit') }}">--}}
                        @csrf

           

                       <div class="form-group row">
                            <label for="origin_terminal" class="col-md-4 col-form-label text-md-right">{{ __('Depart From') }}</label>

                               <div class="col-md-6">
                            <select class=”form-control” name='origin_terminal' style="width:330px;" id='type'>
                                
                            @foreach($terminals as $terminal)
                                 <option value="{{ $terminal->terminal_id}}">{{ $terminal->terminal_location}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="destination_terminal" class="col-md-4 col-form-label text-md-right">{{ __('Arrive To') }}</label>

                               <div class="col-md-6">
                            <select class=”form-control” name='destination_terminal' style="width:330px;" id='type'>
                                
                            @foreach($terminals as $terminal)
                                 <option value="{{ $terminal->terminal_id}}">{{ $terminal->terminal_location}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>

                       
                     <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Insert a new route') }}
                                </button>
                            </div>
                        </div>
                        <hr>

                        
         <table class="table table-striped">

<thead>
    <tr>
    <th scope="col">Route ID</th>
    <th scope="col">Route name</th>
    <th scope="col">Origin Terminal</th>
    <th scope="col">Destination Terminal</th>
  
                        </tr>
                    </thead>
                    <tbody>
                    @if( ! $routes->isEmpty() )
                    @foreach($routes as $route)
                    <tr>
                    <th scope="row">{{$route->route_id}}</th>
                    <td> {{$route->route_name}}</td>               
                    <td>{{$route->origin}}</td>
                    <td>{{$route->destination}}</td>
                  
                  

                    </tr>
                    @endforeach

                    </tbody>
                    </table>



                    @else

                    <p> Tiada cadangan program telah dijumpai </p>

                    @endif


                      

                        
                        

                         

                        

                       
                
            </div>

             




        </div>
    </div>



</div>

  


@endsection