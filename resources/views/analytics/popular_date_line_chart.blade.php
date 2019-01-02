@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" align="center">
      var popular_month = <?php echo $popular_month; ?>;
      console.log(popular_month);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(popular_month);
        var options = {
          title: '',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div align="center" class="">
      <h3 class="panel-title">Number of tickets sold per month</h3>
      <div id="linechart" style="width: 800px; height: 400px" align="center"></div>
      <br><br>
      <table class="table table-striped col-md-8">

            <thead>
                <tr>
                <th scope="col">Month</th>
                <th scope="col">Tickets sold (per seat)</th>
                <th scope="col">Revenue generated (RM)</th>
                
                


                
                </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
            <tr>
            
            <td> {{$ticket->date}}</td>
            <td> {{$ticket->number}}</td>
            <td> {{number_format($ticket->revenue)}}</td>

            </tr>
            @endforeach

            </tbody>
            </table>
    </div>
  </body>
</html>

</div>
</div>
@endsection