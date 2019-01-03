@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    
                    <h5 align="center"><strong>Driver Information</strong></h5>
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

        <form method="post" action="{{action('DriverController@update', $id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH" />

            <div class="form-group" style="float: left; margin: 10px; width: 710px;">
                <strong>&nbsp;&nbsp;Driver Name<Strong><input  type="text" name="driver_name" class="form-control" value="{{$drivers->driver_name}}" placeholder="Enter Driver Name" />
            </div>

            <div class="form-group" style="float: left; margin: 10px; width: 710px">
                <strong>&nbsp;&nbsp;Driver IC<Strong><input type="text" name="driver_ic" class="form-control" value="{{$drivers->driver_ic}}" placeholder="Enter Driver IC" />
            </div>

            <div class="form-group" style="float: left; margin: 10px; width: 710px">
                <strong>&nbsp;&nbsp;Driver Email<Strong><input type="text" name="driver_email" class="form-control" value="{{$drivers->driver_email}}" placeholder="Enter Driver Email" />
            </div>

            <div class="form-group" style="float: left; margin: 10px; width: 710px">
                <strong>&nbsp;&nbsp;Driver Address<Strong><input type="text" name="driver_address" class="form-control" value="{{$drivers->driver_address}}" placeholder="Enter Driver Address" />
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