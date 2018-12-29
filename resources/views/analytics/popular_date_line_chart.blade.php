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
          title: 'Popular Date',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div align="center">
      <h3 class="panel-title">Number of tickets sold per month</h3>
      <div id="linechart" style="width: 1300px; height: 500px" align="center"></div>
    </div>
  </body>
</html>

</div>
</div>
@endsection