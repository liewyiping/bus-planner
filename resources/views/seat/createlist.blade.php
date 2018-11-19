@extends('layouts.app')

@section('content')


<!--seatlist.blade.php dlm folder seat-->
	 

	 		<form id="book" method="post" action="{{ action('BookSeatController@create') }}" >

	<?php 
// return total seat...buses[0]=total seat

	echo "Bus ID: ".$busID ."<br />";
	$totalseat=$totseat[0];
    echo  "Num of seat: " . $totalseat."<br /> <br />" ;



for ($i=1; $i <=$totseat[0] ; $i++) { ?>
    <input type="hidden" name="allseatNo[]" value="{{ $i }}">
<?php } ?>

<br>

<input type="hidden" name="busID" value="{{ $busID }}">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type='submit' name="submit" class='buttons'>


 </form>

      








	
	





@endsection
