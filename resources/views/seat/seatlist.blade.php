@extends('layouts.app')

@section('content')
<head>
	<form id="book" method="post" action="{{ action('CreateSeatController@edit') }}" >

<link rel="stylesheet"  href="{{ asset('css/seatstyle.css') }}">

</head>

<body>

<<<<<<< HEAD
=======

>>>>>>> e1e5f6a9de986c6cecf2406c5b1ad57eeec5dce4
	<?php 

$seatlist=explode(',', $seatid -> seatNo);
$seatTaken=explode(',', $seatid -> seatTaken);
<<<<<<< HEAD
// $priceEach=$trip -> ticket_price;
=======
$priceEach=$trip -> ticket_price;
>>>>>>> e1e5f6a9de986c6cecf2406c5b1ad57eeec5dce4

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
 <input type="hidden" name="trip_id" value="{{ $seatid -> trip_id }}">






	
	<div class="col order-last" id="preticket"> 

<<<<<<< HEAD
	<!-- <div class="row" id="preticket"> -->
		<div style ="font-size: 20px"> BOOKING SUMMARY <br></div>
	    <div>Depart : </div>
	    <p> Number of seat(s) selected: </p>
        <span id="container"  > </span> 
        <div id="price" > Total Price : <br> </div>
        <input type='submit' name="submit" class='buttons' value="Proceed to payment >>"> 
	<!-- </div> -->
=======
>>>>>>> e1e5f6a9de986c6cecf2406c5b1ad57eeec5dce4

	<div style ="font-size: 20px"> BOOKING SUMMARY <br></div>
	
	
	<div>Date of Departure: {{ $trip -> date_depart }}</div>
	<div>Time of Departure : {{ $trip -> time_depart }} </div>
	<div> 
		<span>  Number of seat(s) selected:  </span>
		<span id="container"  ></span>

	</div>
	<span>Total Price: RM </span>
	<span id="price"> 0.00 : <br> </span>
	<div> <input type='submit' name="submit" class='buttons' value="Proceed to payment >>">  </div>
<!-- </div> -->

<!-- <div class="row">
	<p>Occupied seat</p>
	<p>Available seat</p>
</div> -->


</div>


<<<<<<< HEAD
=======


	


>>>>>>> e1e5f6a9de986c6cecf2406c5b1ad57eeec5dce4

</div>
</div>

</form>

<script>
	$numseat=0;
	function writeTo(object) 
	{
  var container = document.getElementById("container");
  
  if (object.checked==true) {
      container.innerHTML = ++$numseat;
      document.getElementById('container').style.color="black"
      $totalprice= $numseat * {{ $priceEach }};

      document.getElementById('price').innerHTML=$totalprice;
  }
  else if (object.checked==false)
  {
	$totalprice= $totalprice - {{ $priceEach}} ;
	document.getElementById('price').innerHTML=$totalprice;

  	container.innerHTML=--$numseat;
  	if ($numseat==0) 
  	{
  		document.getElementById("container").innerHTML = "No seat is selected...";
  		document.getElementById('container').style.color="red";
  		document.getElementById('price').innerHTML="0.00";


  	}
  	
  }
    }

</script>






<script>
	$numseat=0;
	function writeTo(object) 
	{
  var container = document.getElementById("container");
  
  if (object.checked==true) {
      container.innerHTML = ++$numseat;
      document.getElementById('container').style.color="black"
      // document.getElementById('price')=$priceEach;

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




</body>


	
@endsection
