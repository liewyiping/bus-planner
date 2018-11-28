@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center">
      <div class="card-header">
      </div>
      <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Company Name</th>
              <th scope="col">From</th>
              <th scope="col">To</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Price</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

            <?php
            $conn = mysqli_connect("localhost","root","","busplannersystem");
            if ($conn -> connect_error) {
              die("connection failed:".$conn -> connect_error);
            }

            $sql = "SELECT * FROM tickets";
            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
              while ($row = $result -> fetch_assoc()) {
                echo "<tr><td>". $row["trip_id"]."</td><td>". $row["company_name"]."</td><td>". $row["from"]."</td><td>".$row["to"]."</td><td>".$row["date_depart"]."</td><td>".$row['time_depart']."</td><td>".$row['ticket_price']."</td><td><a class='btn btn-primary active'>SELECT</a>"."</td></tr>";
              }
              echo "</table";
            }
            else{
              echo "0 result";
            }
            $conn-> close();
            ?>

            
          </tbody>
        </table>
      </div>
    </div>

                
</div>
@endsection