@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 align="center"><strong>Please insert your commonly used route</strong></h5></div>

            


            <div class="card-body">
                    <form method="POST" action="{{ route('operator.insertRouteInfo.submit') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="route_id" class="col-md-4 col-form-label text-md-right">{{ __('Select route') }}</label>

                            <div class="col-md-6">
                            
                            <select class="form-control" name='route_id' style="width:330px;" id='type'>                                
                            @foreach($routes as $route)
                                 <option value="{{ $route->route_id}}">{{ $route->origin_terminal}} to {{$route->destination_terminal}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="bus_id" class="col-md-4 col-form-label text-md-right">{{ __('Select bus') }}</label>

                               <div class="col-md-6">
                            <select class="form-control" name='bus_id' style="width:330px;" id='type'>
                                
                            @foreach($buses as $bus)
                                 <option value="{{ $bus->bus_id}}">{{$bus->registration_plate}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>

                       
                     <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Insert a new route for bus') }}
                                </button>
                            </div>
                     </div>
                        <hr>

                        
         <table class="table table-striped">

<thead>
    <tr>
    <th scope="col">No</th>  
    <th scope="col">Route</th>
    <th scope="col">Bus</th>
  
                        </tr>
                    </thead>
                    <tbody>
                    @if( ! $bus_routes->isEmpty() )
                    @foreach($bus_routes as $br)
                    <tr>
                    <th scope="row">{{$br->bus_route_id}}</th> 
                    <td>{{$br->route->origin_terminal}} - {{$br->route->destination_terminal}}</td>   
                    <td>{{$br->bus->registration_plate}}</td>
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

  


@endsection