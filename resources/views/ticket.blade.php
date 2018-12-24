@extends('layouts.app')

@section('content')


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

   <br><br><br>
   <div>Point: {{ $point }}</div>

	<div> <input type='submit' name="submit" class='btn btn-primary' value="Complete" id="submit"  />  </div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">


</form>
</body>
@endsection