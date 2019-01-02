@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

<html>
  <head>
  <title>Popular Destination</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" align="center">
      var popular_destination = <?php echo $popular_destination; ?>;
      console.log(popular_destination);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(popular_destination);
        var options = {
          title: 'Percentage of Popular Destination',
          curveType: 'function',
          pieHole:0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div align="center">
      <h3 class="panel-title">Popular Destination</h3>
      <div id="donutchart" style="width: 800px; height: 400px" align="center"></div>
      <br><br>
      <table class="table table-striped col-md-10">

            <thead>
                <tr>
                <th scope="col">Destination</th>
                <th scope="col">Tickets sold (per seat)</th>
                <th scope="col">Revenue generated (RM)</th>
                
                


                
                </tr>
            </thead>
            <tbody>
            @foreach($tickets_destination as $ticket)
            <tr>
            <td> {{$ticket->destination}}</td>
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