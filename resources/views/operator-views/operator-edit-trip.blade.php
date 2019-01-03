@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/operator/insert-trip') }}">
                        <input type="button" class="btn btn-primary" value="Back"/>
                    </a>
                    
                    <h5 align="center"><strong>Trip Information</strong></h5>
                </div>
<br>

@if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        <div>
        @endif

        <form method="post" action="{{action('TripController@update', $trip)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH" />

            <!-- <div class="form-group" style="float: left; margin: 10px; width: 710px;">
                <strong>&nbsp;&nbsp;Choose Bus<Strong><input name="bus_id" class="form-control" value="{{$trip->bus_id}}" placeholder="Choose A Bus" />
            </div>

            <div class="form-group" style="float: left; margin: 10px; width: 710px;">
                <strong>&nbsp;&nbsp;Route options<Strong><input name="route_id" class="form-control" value="{{$trip->route_id}}" placeholder="Choose A Route" />
            </div> -->

            <div class="form-group" style="float: left; margin: 10px; width: 710px;">
                <strong>&nbsp;&nbsp;Depart Date<Strong><input  type="date" name="date_depart" class="form-control" value="{{$trip->date_depart}}"/>
            </div>

            <div class="form-group" style="float: left; margin: 10px; width: 710px;">
                <strong>&nbsp;&nbsp;Depart Time<Strong><input  type="time" name="time_depart" class="form-control" value="{{$trip->time_depart}}" />
            </div>

            <div class="form-group" style="float: left; margin: 10px; width: 710px;">
                <strong>&nbsp;&nbsp;Ticket Price (RM)<Strong><input  type="number" name="ticket_price" step="0.01" min="0" class="form-control" value="{{$trip->ticket_price}}" placeholder="Enter Ticket Price" />
            </div>

            <div class="form-group" style="text-align: center; margin: 10px; width: 710px">
                <input type="submit" class="btn btn-primary" value="Update" />
            </div>
        </form>

       </div>
        </div>
    </div>
</div>
@endsection