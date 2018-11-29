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
                    @if( ! $trips->isEmpty() )
                    @foreach($trips as $trip)
                    <tr id="{{$trip->route_id}}">
                    <th scope="row">{{$trip->trip_id}}</th> 
                    <td>{{$trip->bus->registration_plate}}</td>   
                    <td>{{$trip->route->origin_terminal}}</td>
                    <td>{{$trip->route->destination_terminal}}</td>
                    <td>{{$trip->date_depart}}</td>
                    <td>{{$trip->time_depart}}</td>
                    <td>RM {{$english_format_number = number_format($trip->ticket_price, 2, '.', '')}}</td>
                    <td><a href="seatlist/4" class='btn btn-primary active'>SELECT</a></td>
                    </tr>
                    @endforeach

            </tbody>
        </table>
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

