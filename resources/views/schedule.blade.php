@extends('layouts.app')

@section('content')


<head>
	
</head>

<body>
	<form id="cus_schedule" method="post" action="{{ action('CreateSeatController@showticket') }}">

      <?php
      foreach ($ticket as $ticket)
      {
         if ($ticket -> date_depart >= date("Y-m-d")) 
            { ?>
         <div id="showticket" onclick="showticket()" value="{{ $ticket -> ticket_id }}" > {{ $ticket -> ticket_id }}</div> 
     <?php  }

       } ?>

      
   <input type="hidden" name="ticket_id" id="ticket_id">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

<script>
   function showticket()
   {
      document.getElementById("ticket_id").value=1;
      $("form").submit();

   }
</script>



</body>
@endsection