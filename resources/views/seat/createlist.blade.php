@extends('layouts.app')

@section('content')


<!--seatlist.blade.php dlm folder seat-->
<div class="card-body">
<form id="book" method="post" action="{{ action('BookSeatController@create') }}" >

<?php 
// return total seat...buses[0]=total seat

	echo "Trip ID: ".$trip_id ."<br />";
	// $totalseat=$route_id -> total_seat;
	
	echo  "Num of seat: " . $totseat[0]."<br /> " ;
	echo "Bus Layout: ". $bus_layout[0];




for ($i=1; $i <=$totseat[0] ; $i++) { ?>
    <input type="hidden" name="allseatNo[]" value="{{ $i }}">
<?php } ?>

<br>

<input type="hidden" name="trip_id" value="{{ $trip_id }}">
<input type="hidden" name="bus_layout" value="{{ $bus_layout[0] }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<br>
<input type='submit' name="submit" class="btn btn-primary">

</form>

</div>







	
	





@endsection
