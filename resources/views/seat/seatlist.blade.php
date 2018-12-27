@extends('layouts.app')

@section('content')
<head>
	<form id="book" method="post" action="{{ action('CreateSeatController@edit') }}" >

<link rel="stylesheet"  href="{{ asset('css/seatstyle.css') }}">

</head>

<body>


<?php 
$seatlist=explode(',', $seatid -> seatNo);
$seatTaken=explode(',', $seatid -> seatTaken);
$priceEach=$trip -> ticket_price;

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
			 <label>  <input  id="{{ $seatid -> seatNo }}"  class="seat-select" type="checkbox" value="{{ $seatlist }}"  name="seat[]" disabled >
			 {{ $seatlist }}</label>
	         </span>
	         
	         

        <?php 
	    } 
	     else 
	     {  ?>
	     	<span  class="free" style = "color:MediumSeaGreen ;">
		    <label><input id="{{ $seatid -> seatNo }}" class="seat-select" type="checkbox" value="{{ $seatlist }}" onclick="return writeTo(this)" name="seat[]" >
		    {{ $seatlist }} </label>
		   
		    </span>
		    
		    
	    <?php 
	     }
       }
 
        ?>
        <span> </span>
       </div>





<input type="hidden" name="seatTaken" value="{{ $seatid -> seatTaken }}">
<input type="hidden" name="seatid" value="{{ $seatid -> seatid }}">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input id="totalprice" type="hidden" name="totalprice">
 <input type="hidden" name="trip_id" value="{{ $trip -> trip_id }}">
 <input type="hidden" name="route_id" value="{{ $route_id->route_id	 }}">
 <input id="pax_num" type="hidden" name="pax_num" value="0">
 






	
<!-- <div class="col order-last" id="preticket">  -->
<div class="col order-last" > 
	<div class="row" id="preticket">
		<h3> BOOKING SUMMARY <br></h3>
		
		<div><p> Depart From: {{ $route_id -> origin_terminal }} </p></div><br>
		<div><p> Destination: {{ $route_id -> destination_terminal }} </p><div>

		<div>Date of Departure: {{ $trip -> date_depart }}</div><br>
	    <div>Time of Departure : {{ $trip -> time_depart }} </div><br>
	    <div> 
	    	<span>  Number of seat(s) selected:  </span>
	    	<span id="container"  ></span>

	    </div><br>

		<div>
        	<span>Total Price: RM </span>
        	<span name="price" id="price"> 0.00   <br> </span>
			
		</div><br><br>
        <div> <input type='submit' name="submit" class='btn btn-primary' value="Proceed to payment >>" id="submit" disabled="" />  </div>
       

        

	</div>

	<div id="reference" class="row">
		<div style="color: #B8B8B8 "> -> Occupied seat <br></div>
		<div style="color:  #98FB98"> -> Available seat <br></div>
		<div style="color: #03a9f4"> -> selected seat <br></div>
	</div>


</div>


	



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
      document.getElementById("submit").disabled = false;
      document.getElementById("totalprice").value=$totalprice;
      document.getElementById('pax_num').value=$numseat;
      
  }
  else if (object.checked==false)
  {
  	 $totalprice= $totalprice - {{ $priceEach }}
    document.getElementById('price').innerHTML=$totalprice;
    document.getElementById('pax_num').value=$numseat;

  	container.innerHTML=--$numseat;
  	if ($numseat==0) 
  	{
  		document.getElementById("container").innerHTML = "No seat is selected...";
  		document.getElementById('container').style.color="red";
  		document.getElementById('price').innerHTML="0.00";

  		document.getElementById("submit").disabled = true;
  		

  	}
  	document.getElementById("totalprice").value=$totalprice;
  	
  }
  

  
}  		



</script>



</body>


	
@endsection
