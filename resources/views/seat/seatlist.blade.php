@extends('layouts.app')

@section('content')
<head>
	<form id="book" method="post" action="{{ action('CreateSeatController@edit') }}" >

<link rel="stylesheet"  href="{{ asset('css/seatstyle.css') }}">

</head>

<body>

<script>
	$numseat=0;
	function writeTo(object) 
	{
  var container = document.getElementById("container");
  
  if (object.checked==true) {
      container.innerHTML = ++$numseat;
      document.getElementById('container').style.color="black"
  }
  else if (object.checked==false)
  {

  	container.innerHTML=--$numseat;
  	if ($numseat==0) 
  	{
  		document.getElementById("container").innerHTML = "No seat is selected...";
  		document.getElementById('container').style.color="red";

  	}
  	
  }
    }

</script>

	<?php 

$seatlist=explode(',', $seatid -> seatNo);
$seatTaken=explode(',', $seatid -> seatTaken);

?>
<div  class="container"> 
	 <div class="row" >




	 	<div class="col order-first" id="{{$seatid -> bus_layout}}">
        <?php 


       foreach ($seatlist as $seatlist)
       {
	     if (in_array($seatlist, $seatTaken)) 
	     {
		?>
		     <span class="booked"  style = "color:red;">
			 <label></label><input  id="{{ $seatid -> seatNo }}"  class="seat-select" type="checkbox" value="{{ $seatlist }}"  name="seat[]" disabled />{{ $seatlist }}  </label> 
		     </span>

        <?php 
	    } 
	     else 
	     {  ?>
	     	<span  class="free" style = "color:MediumSeaGreen ;">
		    <label></label><input id="{{ $seatid -> seatNo }}" class="seat-select" type="checkbox" value="{{ $seatlist }}" onclick="return writeTo(this)" name="seat[]" />{{ $seatlist }} </label> 
		    </span>
		    
	    <?php 
	     }

	 //     if (count($seat[])<1) {
		// echo "string";
	 //     }
	     // echo count($_POST['checkbox']);

       }
 
        ?>
       </div>





<input type="hidden" name="seatTaken" value="{{ $seatid -> seatTaken }}">
<input type="hidden" name="seatid" value="{{ $seatid -> seatid }}">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">






	
<div class="col order-last" id="preticket"> 

	<!-- <div class="row" id="preticket"> -->
		<div style ="font-size: 20px"> BOOKING SUMMARY <br></div>
	    <div>Depart : </div>
	    <p> Number of seat(s) selected: </p>
        <span id="container"  > </span> 
        <div> Total Price : <br> </div>
        <input type='submit' name="submit" class='buttons' value="Proceed to payment >>"> 
	<!-- </div> -->

	<!-- <div class="row">
		<p>Occupied seat</p>
		<p>Available seat</p>
	</div> -->


</div>


	



</div>
</div>

</form>


</body>


	
@endsection
