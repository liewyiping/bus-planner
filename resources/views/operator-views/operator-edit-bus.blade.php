@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 align="center"><strong>===== Bus Information =====</strong></h5></div>
<br>
<h5 align="center"><strong><i>Edit Bus Info</i></strong></h5>
<hr>

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

            <div class="form-group">
                <input type="text" name="total_seat" class="form-control" value="{{$bus->total_seat}}" placeholder="Enter Total Seat" />
            </div>

            <div class="form-group">
                <input type="text" name="registration_plate" class="form-control" value="{{$bus->registration_plate}}" placeholder="Enter Registration Plate" />
            </div>

            <div class="form-group">
                <input type="text" name="operator_id" class="form-control" value="{{$bus->operator_id}}" placeholder="Enter Operator ID" />
            </div>

            <div class="form-group">
                <input type="text" name="created_at" class="form-control" value="{{$bus->created_at}}" placeholder="Enter Date time" />
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update" />
            </div>
        </form>

    <hr>

       </div>
        </div>
    </div>
</div>
@endsection