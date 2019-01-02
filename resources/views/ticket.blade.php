@extends('layouts.app')

@section('content')

<div style="padding: 20px;" class="container">
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
	
   <!-- <h1>Ticket</h1> -->
   <h3 style="padding-left: 20px; padding-top: 15px;">{{ $tickets -> company_name }} </h3>
   <div>&nbsp;&nbsp;&nbsp;Price: RM {{$english_format_number = number_format($tickets->ticket_price, 2, '.', '')}}</div>
   <div>&nbsp;&nbsp;&nbsp;Ticket ID: {{$tickets -> ticket_id}}</div>
   <div>&nbsp;&nbsp;&nbsp;From: {{$route_id -> origin_terminal }} </div>
   <div>&nbsp;&nbsp;&nbsp;To: {{$route_id -> destination_terminal }} </div>

   <div>&nbsp;&nbsp;&nbsp;Date of Departure: {{ $trips -> date_depart }}</div>
   <div>&nbsp;&nbsp;&nbsp;Time of Departure : {{ $trips -> time_depart }} </div>
   <div>&nbsp;&nbsp;&nbsp;Number of seat(s) booked: {{ $tickets -> pax_num }}</div>
   <div>&nbsp;&nbsp;&nbsp;Seat Number: {{ $tickets -> seatSelect }}</div>

   <br><br>
   <div>&nbsp;&nbsp;&nbsp;Your current point: {{ $point }} points</div>
   <br>

   <!-- <a href="{{ url('/schedule') }}" class="btn btn-primary" style='width:40%;'>Complete</a> -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}">



</body>
</div>
        </div>
    </div>
</div>
@endsection
