@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="clear: both">
                    <h6 style="float: left; margin:5px;">{{$year_report}} annual report </h6> 
                </div>

                <div class="card-body">

                <h5>{{$bus_company_name}}</h5>
                <h5>Total revenue :RM {{number_format($total_revenue_year)}} </h5>
                <h5>Total tickets sold : {{$total_seat_sold}}  </h5>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  
                    <br>
                    <div align="center">
                    </div>

                    <div id="app">
            {!! $chart->container() !!}
        </div>
       
        {!! $chart->script() !!}

        <table class="table table-striped">

            <thead>
                <tr>
                <th scope="col">Months</th>
                <th scope="col">Revenue generated(RM)</th>
                <th scope="col">Total tickets sold</th>
                
                


                
                </tr>
            </thead>
            <tbody>
            @foreach($sort_sum_months as $ticket)
            <tr>
            
            <td> {{$ticket->months}}</td> 
            <td> {{number_format($ticket->sums)}}</td>    
            <td> {{$ticket->pax_num_total}}</td>  
            

            </tr>
            @endforeach


            </tbody>
            </table>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection