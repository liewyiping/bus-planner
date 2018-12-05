@extends('layouts.app')

@section('content')


<head>
	
</head>

<body>
	<form id="book" method="post" action="{{ action('CreateSeatController@show') }}" >

	<p> price: {{ $totalprice }}</p>

	<div> <input type='submit' name="submit" class='btn btn-primary' value="Proceed to payment >>" id="submit"  />  </div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">


</form>
</body>
@endsection