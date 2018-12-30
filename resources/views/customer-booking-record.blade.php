@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Booking Records</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
@if (count($tickets)>0)                      
<table class="table table-striped">

<thead>
<tr>
<th scope="col">Ticket ID</th>  
<th scope="col">Bus Company Name</th>  
<th scope="col">From</th>
<th scope="col">To</th>
<th scope="col">Departure Date</th>
<th scope="col">Departure Time</th>
<th scope="col">No. of Pax</th>
<th scope="col">Total Price</th>
<th scope="col">Booking at</th>
<!-- <th scope="col">Modify bus info</th>  
<th scope="col">Delete bus</th>   -->

               </tr>
           </thead>
           <tbody>
           
           @foreach($tickets as $ticket)
            <tr>
            <th scope="row">{{$ticket->ticket_id}}</th> 
            <td>{{$ticket->company_name}}</td>
            <td>{{$ticket->origin_terminal}}</td>
            <td>{{$ticket->destination_terminal}}</td>
            <td>{{$ticket->date_depart}}</td>
            <td>{{$ticket->time_depart}}</td>
            <td>{{$ticket->pax_num}}</td>
            <td>RM {{$english_format_number = number_format($ticket->ticket_price, 2, '.', '')}}</td>
            <td>{{$ticket->created_at->format('d/m/Y')}}</td>
          
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
                    <td align="center"><a>No booking records were found!</a></td>
            
                </tbody>
            </table>

            @endif
   </div>
</div>
</div>
                    <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection