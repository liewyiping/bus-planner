@extends('layouts.app')

@section('content')


<head>
	
</head>


<body>
   <form id="cus_schedule" method="post" action="{{ action('CreateSeatController@showticket') }}">



      <select name="ticket">
          <?php
      foreach ($ticket as $ticket)
      {
         if ($ticket -> date_depart >= date("Y-m-d")) 
            { ?>
              
               <option value="{{$ticket->ticket_id}}">{{$ticket->ticket_id}}


               <table style="width:100%">
               <li class="dropdown-item" style="min-width: 530px"  > 
                  <tr style="color: grey">
                  <th>Ticket ID:</th>
                  <th>Date of Departure:</th>
                  <th>Time of Departure:</th>
               </tr>
               
               
                  <tr >
                  <th><u style=" cursor:grabbing"; id="showticket" onclick="showticket()" value="{{ $ticket -> ticket_id }}" > {{ $ticket -> ticket_id }}</u>  </th>
                  <th> {{ $ticket -> date_depart }}</th>
                  <th> {{ $ticket -> time_depart }} </th>
               </tr>
               </li>
              
               
               
               </table>
              </option>
         
     <?php  }

       } ?>
       </select>
        <!-- <input type="hidden" name="ticket_id" id="ticket_id"> -->
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit">
   </form>
</body>


@endsection