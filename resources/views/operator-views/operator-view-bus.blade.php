@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/home') }}">
                        <input type="button" class="btn btn-primary" value="Back"/>
                    </a>

                    <a href="{{ url('/operator/insert-bus-info') }}">
                        <input type="button" class="btn btn-primary" value="Insert bus"/>
                    </a>
                    
                    <h5 align="center"><strong>Bus Information</strong></h5>
                </div>
<br>
<h5 align="center"><strong><i>Total existing buses = [ {{ $buses->total() }} ]</i></strong></h5>
<hr>

@if(isset($buses))
@if (count($buses)>0)

@foreach($buses as $bus)

    <div class ='well'>
       <h6> &nbsp;&nbsp; Bus Registration Plate: {{$bus->registration_plate}} </h6>
       <h6> &nbsp;&nbsp; Number of seats : {{$bus->total_seat}}  </h6>
       <h6> &nbsp;&nbsp; Operator ID : {{$bus->operator_id}}  </h6>
       <h6> &nbsp;&nbsp; Created  : {{$bus->created_at}}  </h6>

       <div style="float: left; margin: 10px;">
            {{  Form::open(array('url' => 'bus/' . $bus->bus_id . '/edit', 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'GET') }}
                {{ Form::submit('Edit', array('class' => 'btn btn-info')) }}
            {{ Form::close() }}
        </div>
        
        <div style="float: left; margin: 10px;">
            {{  Form::open(array('url' => 'bus/' . $bus->bus_id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </div>
       
    </div>

    <hr>

@endforeach
{{ $buses->links() }}
@else

<p> No buses found </p>

@endif
@endif

       </div>
        </div>
    </div>
</div>
@endsection