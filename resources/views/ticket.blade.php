@extends('layouts.app')

@section('content')


<head>
	
</head>

<body>
	<form id="book" method="post" action="{{ action('CreateSeatController@show') }}" >
<h1>Ticket</h1>
	<div> price: RM {{ $totalprice }}</div>
	<div>Date of Departure: {{ $trips -> date_depart }}</div>
	   <div>Time of Departure : {{ $trips -> time_depart }} </div>

	<div> <input type='submit' name="submit" class='btn btn-primary' value="complete" id="submit"  />  </div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">


</form>
</body>
@endsection