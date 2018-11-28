<form id="book" method="post" >


	<?php 

	// $totalavail=explode(",", $seatid -> seatAvail)
	// $totalavail=(string)count($totalavail);
	// echo "Total available seat: ". $totalavail;

$seatlist=explode(',', $seatid -> seatNo);
$seatTaken=explode(',', $seatid -> seatTaken);

foreach ($seatlist as $seatlist)
 {
	if (in_array($seatlist, $seatTaken)) 
	{
		?>
		<div style = "color:red;">
			 <label></label><input  id="{{ $seatid -> seatNo }}"  class="seat-select" type="checkbox" value="{{ $seatlist }}" name="seat[]" disabled />seat {{ $seatlist }}  </label> <br>
		</div>

       <?php 
	} 
	else 
	     {  ?>
	     	<div style = "color:MediumSeaGreen ;">
		    <label></label><input id="{{ $seatid -> seatNo }}" class="seat-select" type="checkbox" value="{{ $seatlist }}" name="seat[]" disabled />seat {{ $seatlist }} </label> <br>
		    </div>
	<?php }
} 

 
echo "<br>";





	 
 ?>