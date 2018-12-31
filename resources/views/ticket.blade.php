@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <!-- <a href="{{ url('/home') }}">
                        <input type="button" class="btn btn-primary" value="Home"/>
                    </a> -->
                    
                    <h5 align="center"><strong>Ticket Information</strong></h5>
                </div>


<head>
	
</head>

<body>
	
   <h1>Ticket</h1>
   <h3>{{ $bus_company_name }} </h3>
   <div> price: RM {{ $tickets -> ticket_price }}</div>
   <div>Ticket ID: {{$tickets -> ticket_id}}</div>
   <div>From: {{$route_id -> origin_terminal }} </div>
   <div>To: {{$route_id -> destination_terminal }} </div>

   <div>Date of Departure: {{ $trips -> date_depart }}</div>
   <div>Time of Departure : {{ $trips -> time_depart }} </div>
   <div>Number of seat(s) booked: {{ $tickets -> pax_num }}</div>

   <br><br><br>
   <div>Point: {{ $point }}</div>

   <!-- <a href="{{ url('/schedule') }}" class="btn btn-primary" style='width:40%;'>Complete</a> -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}">



</body>
</div>
        </div>
    </div>
</div>
@endsection
