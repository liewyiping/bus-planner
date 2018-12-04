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
                    <div class="">
                    <h5><strong>Please select route</strong></h5>
                      <select id="myInput" class="form-control">
                      <option value="">Select</option>
                      @foreach(busplannersystem\Route::all() as $route_list)
                      <option class="option "value="{{$route_list->route_id}}">{{$route_list->origin_terminal}} - {{$route_list->destination_terminal}}</option>
                      @endforeach
                      </select>
                    </div>
                    <br>
 

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Registration Plate</th>
              <th scope="col">From</th>
              <th scope="col">To</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Price</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="myTable">
                    @if( ! $seats->isEmpty() )
                    @foreach($seats as $seat)
                    <tr id="{{$seat->trip->route_id}}">
                    <th scope="row">{{$seat->trip->trip_id}}</th> 
                    <td>{{$seat->trip->bus->registration_plate}}</td>   
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
                    @else

                      <p> No trips were found </p>

                    @endif
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

