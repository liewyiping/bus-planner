@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 align="center"><strong>===== Bus Information =====</strong></h5></div>
<br>
<h6 align="center"><strong><i>Registration plate: {{$bus->registration_plate}}</i></strong></h6>


@if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        <div>
        @endif

        <form method="post" action="{{action('BusController@update', $id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH" />

            <div class="form-group" style="float: left; margin: 10px; width: 710px;">
                <strong>&nbsp;&nbsp;Total Seat<Strong><input  type="text" name="total_seat" class="form-control" value="{{$bus->total_seat}}" placeholder="Enter Total Seat" />
            </div>

            <div class="form-group" style="float: left; margin: 10px; width: 710px">
                <strong>&nbsp;&nbsp;Registration Plate<Strong><input type="text" name="registration_plate" class="form-control" value="{{$bus->registration_plate}}" placeholder="Enter Registration Plate" />
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