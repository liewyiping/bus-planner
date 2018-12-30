<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Invoice</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 
<div class="row">
<div class="col-xs-6 text-center">
  <br>
</div>
<div class="col-xs-6 text-right">
  <h1>INVOICE</h1>
  <h5>Ticket ID: {{ $ticket->ticket_id }}</h5>
  <h5>Booking Date: {{ $ticket->created_at->format('d/m/Y') }}</h5>
</div>
</div>
<hr>
<div class="row">
  <div class="col-xs-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>From: {{ $ticket->company_name }}</h4>
      </div>
      <div class="panel-body">
        <p>
            Company address
        </p>
      </div>
    </div>
  </div>
    <div class="col-xs-5 col-xs-offset-2 text-right">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h4>To : {{ $ticket->user->name }}</h4>
            </div>
            <div class="panel-body">
        <p>
        {{ $ticket->user->email }}
        </p>
            </div>
        </div>
    </div>
</div>
 
<table class="table table-bordered">
  <tr>
    <th>Departure</th>
    <th>Arrival</th>
    <th class="text-right">Departure Date</th>
    <th class="text-right">Departure Time</th>
    <th class="text-right">No. of Pax</th>
    <th class="text-right">Total price(RM)</th>
  </tr>
  
  <tr>
    <td>{{ $ticket->origin_terminal }}</td>
    <td>{{ $ticket->destination_terminal }}</td>
    <td class="text-right">{{ $ticket->date_depart }}</td>
    <td class="text-right">{{ $ticket->time_depart }}</td>
    <td class="text-right">{{ $ticket->pax_num }}</td>
    <td class="text-right">{{ $ticket->ticket_price }}</td>
  </tr>
</table>

  <div class="col-xs-7">
    <div class="span7">
      <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
          <p><br></p>
          <p><br></p>
          <p><br></p>
          <p><br></p>
          <p><br></p>
          <p><br></p>
          <p>Computer-generated invoice. No signature is required.</p>
        </div>
      </div>
    </div>
  </div>
</div>
 
</body>
</html>