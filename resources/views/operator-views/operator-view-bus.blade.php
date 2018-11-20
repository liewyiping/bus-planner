@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Insert Bus Info</div>
<br>
<h5 align="center"><strong>Existing bus</strong></h5>
<h5 align="center">Total buses = [ {{ $buses->total() }} ]</h5>
<hr>

@if(isset($buses))
@if (count($buses)>0)

@foreach($buses as $bus)

    <div class ='well'>
       <h6> Bus Registration Plate: {{$bus->registration_plate}} </h6>
       <h6> Number of seats : {{$bus->total_seat}}  </h6>
       <h6> Operator ID : {{$bus->operator_id}}  </h6>
       <h6> Created  : {{$bus->created_at}}  </h6>

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