@extends('layouts.app')

        <!-- Styles -->
        <style>
            /* Create four equal columns that floats next to each other */
            .column {
                float: left;
                width: 25%;
                padding: 10px;
                height: 60px; /* Should be removed. Only for demonstration */
            }
            button {
                width: 100%;
                height: 100%;
            }

        </style>

@section('content')

        <div class="row">
            <div class="container">
                <div class="page-header">
                </div>

                <form action="/home" method="POST" role="search">
                      {{ csrf_field() }}
                        <div class="column">
                            <select id="" class="form-control" name="search_origin" required>
                                <option value="">Bus: Origin</option>
                                @foreach(busplannersystem\Route::all()->unique('origin_terminal') as $route_list)
                                <option  class="option "value="{{$route_list->origin_terminal}}">{{$route_list->origin_terminal}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="column">
                            <select id="" class="form-control" name="search_destination" required>
                                <option value="">Bus: Destination</option>
                                @foreach(busplannersystem\Route::all()->unique('destination_terminal') as $route_list)
                                <option  class="option "value="{{$route_list->destination_terminal}}">{{$route_list->destination_terminal}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Malaysia Time Zone UTC +8-->
                        <?php
                            date_default_timezone_set("Asia/Kuala_Lumpur");
                        ?>

                        <div class="column">
                            <input value="{{ date('Y-m-d') }}" type="date" class="form-control" name="search_date" placeholder="Search date" required><span class="input-group-btn">
                        </div>

                        <div class="column">
                            <button type="submit" class="btn btn-success">
                            <span class="button glyphicon glyphicon-search"> Search </span>
                            </button>
                            
                        </div>
                </form>

            </div>
        </div>

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
        <div style="clear: both">
            <h4 style="float: left"><strong>{{$seat->trip->route->origin_terminal}} → {{$seat->trip->route->destination_terminal}}</strong></h4>
            <h5 style="float: right">{{$seat->trip->date_depart}}</h5>
        </div>
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
                <td>{{$seat->trip->bus->operator->user->name}}</td>
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
            <td align="center"><a>No details found.. Try to search again!</a></td>
            
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

