@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/operator/view-bus-info') }}">
                        <input type="button" class="btn btn-primary" value="Back"/>
                    </a>
                    
                    <h5 align="center"><strong>Ticket Information</strong></h5>
                </div>


<head>
	
</head>

<body>
	<form id="book" method="post" action="{{ action('CreateSeatController@show') }}" >
   <h1>Ticket</h1>
   <h3>{{ $bus_company_name }} </h3>
   <div> price: RM {{ $totalprice }}</div>
   <div>From: {{$route_id -> origin_terminal }} </div>
   <div>To: {{$route_id -> destination_terminal }} </div>

   <div>Date of Departure: {{ $trips -> date_depart }}</div>
   <div>Time of Departure : {{ $trips -> time_depart }} </div>
   <div>Number of seat(s) booked: {{ $tickets -> pax_num }}</div>

   <br><br><br>
   <div>Point: {{ $point }}</div>

	<div> <input type='submit' name="submit" class='btn btn-primary' value="Complete" id="submit"  />  </div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">


</form>
</body>
</div>
        </div>
    </div>
</div>
@endsection
