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
                    
                    <h5 align="center"><strong>Please insert a trip</strong></h5>
                </div>

            



            <div class="card-body">
                    <form method="POST" action="{{ route('operator.insertTripInfo.submit') }}">
                        @csrf

                         <div class="form-group row">
                            <label for="bus_id" class="col-md-4 col-form-label text-md-right">{{ __('Choose bus') }}</label>

                               <div class="col-md-6">
                            <select class="form-control input-lg dynamic" data-dependant="route_id" name='bus_id' id='bus_id'>
                                
                            @foreach($buses as $bus)
                                 <option value="{{ $bus->bus_id}}">{{$bus->bus_id}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="route_id" class="col-md-4 col-form-label text-md-right">{{ __('Route options') }}</label>

                            <div class="col-md-6">
                            
                            <select class="form-control input-lg" name='route_id' id='route_id'>                                
                            <option value="">Select Route</option>
                            </select>

                            </div>
                            
                        </div>

                        
                         <div class="form-group row">
                            
                            <label for="date_depart" class="col-md-4 col-form-label text-md-right">{{ __('Depart Date') }}</label>   
                            
                            <div class="col-md-6">
                                <input id="date_depart" type="date" class="form-control{{ $errors->has('date_depart') ? ' is-invalid' : '' }}" name="date_depart" value="{{ old('date_depart') }}" required autofocus>

                                @if ($errors->has('date_depart'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_depart') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       <div class="form-group row">
                            
                            <label for="time_depart" class="col-md-4 col-form-label text-md-right">{{ __('Depart Time') }}</label>

                                <div class="col-md-6">
                                <input id="time_depart" type="time" class="form-control{{ $errors->has('time_depart') ? ' is-invalid' : '' }}" name="time_depart" value="{{ old('time_depart') }}" required autofocus>

                                @if ($errors->has('time_depart'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('time_depart') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="ticket_price" class="col-md-4 col-form-label text-md-right">{{ __('Price Ticket (RM)') }}</label>

                            <div class="col-md-6">
                                <input id="ticket_price" type="number" step="0.01" min="0" class="form-control{{ $errors->has('ticket_price') ? ' is-invalid' : '' }}" name="ticket_price" value="{{ old('ticket_price') }}" required autofocus>

                                @if ($errors->has('ticket_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ticket_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                     <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Insert a new trip') }}
                                </button>

                                
                            </div>
                     </div>
                        <hr>

                        
         <table class="table table-striped">

<thead>
    <tr>
    <th scope="col">Trip ID</th>  
    <th scope="col">Route</th>
    <th scope="col">Depart Date</th>
    <th scope="col">Depart Time</th>
    <th scope="col">Ticket Price</th>
  
                        </tr>
                    </thead>
                    <tbody>
                    @if( ! $trips->isEmpty() )
                    @foreach($trips as $trip)
                    <tr>
                    <th scope="row">{{$trip->trip_id}}</th> 
                    <td>{{$trip->route->origin_terminal}} - {{$trip->route->destination_terminal}}</td>   
                    <td>{{$trip->date_depart}}</td>
                    <td>{{$trip->time_depart}}</td>
                    <td>RM {{$english_format_number = number_format($trip->ticket_price, 2, '.', '')}}</td>
                   
                  
                  

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

<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#bus_id').change(function(){
  $('#route_id').val('');

 });


 

});
</script>
