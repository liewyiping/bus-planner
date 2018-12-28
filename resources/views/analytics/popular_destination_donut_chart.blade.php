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
  <br><br>
    <div align="center">
      <h3 class="panel-title">Popular Destination</h3>
      <div id="donutchart" style="width: 1300px; height: 500px" align="center"></div>
    </div>
  </body>
</html>