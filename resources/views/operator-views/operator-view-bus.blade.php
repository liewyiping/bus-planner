@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 align="center"><strong>===== Bus Information =====</strong></h5></div>
<br>
<h5 align="center"><strong><i>Existing bus</i></strong></h5>
<h5 align="center">Total buses = [ {{ $buses->total() }} ]</h5>
<hr>

@if(isset($buses))
@if (count($buses)>0)

@foreach($buses as $bus)

    <div class ='well'>
       <h6> &nbsp;&nbsp;&nbsp; Bus Registration Plate: {{$bus->registration_plate}} </h6>
       <h6> &nbsp;&nbsp;&nbsp; Number of seats : {{$bus->total_seat}}  </h6>
       <h6> &nbsp;&nbsp;&nbsp; Operator ID : {{$bus->operator_id}}  </h6>
       <h6> &nbsp;&nbsp;&nbsp; Created  : {{$bus->created_at}}  </h6>
       <div style="margin-left: 15px;">
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