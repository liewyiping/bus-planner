@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center">
      <div class="card-header">
      <h5><strong>Search result(s)</strong></h5>
      </div>
      <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="container">
    @if(isset($details))
    @foreach($details as $seat)
        @if ($loop->first)
            <h4 align="left"><strong>{{$seat->trip->route->origin_terminal}} → {{$seat->trip->route->destination_terminal}}</strong></h4>
            <h5 align="right">{{$seat->trip->date_depart}}</h5>
        @endif
    @endforeach
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Operator</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $seat)
            <tr>
                <td>{{$seat->trip->bus->operator->user_operator->name}}</td>
                <td>{{$seat->trip->route->origin_terminal}}</td>
                <td>{{$seat->trip->route->destination_terminal}}</td>
                <td>{{$seat->trip->date_depart}}</td>
                <td>{{$seat->trip->time_depart}}</td>
                <td>RM {{$english_format_number = number_format($seat->trip->ticket_price, 2, '.', '')}}</td>
                <td><a href="seatlist/{{$seat->seatid}}" class='btn btn-primary active'>SELECT</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            <td><a href="/">No details found.. Try to search again!</a></td>
            
        </tbody>
    </table>
    
    @endif

</div>
        <br>
         <div class="row">
                    <div class="column">
                      <img src="img_snow.jpg" alt="Snow" style="width:100%">
                    </div>
                    <div class="column">
                      <img src="img_forest.jpg" alt="Forest" style="width:100%">
                    </div>
                    <div class="column">
                      <img src="img_mountains.jpg" alt="Mountains" style="width:100%">
                    </div>
        </div> 
      </div>
    </div>

                
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(function() {
  $("#myInput").change(function() {
    var rex = $('#myInput').val();
    if (rex != "") $("tbody tr").show().not('#' + rex).hide();
    else $("tbody tr").show();
  });
});

</script>
@endsection

