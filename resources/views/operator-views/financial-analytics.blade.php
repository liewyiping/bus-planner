@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="clear: both">
                    <h6 style="float: left; margin:5px;">Financial Analytics Dashboard </h6>
                </div>

                <div class="card-body">

                <form method="POST" action="{{ route('operator.insert_year_report') }}">
                @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  
                 
                    

                    <h3>{{$bus_company_name}}</h3>
                    

                    <div class="form-group row">
                            <label for="year-report" class="col-md-4 col-form-label text-md-right">{{ __('Choose annual report') }}</label>

                            <div class="col-md-6">
                            <select class=”form-control” name='year_report' style="width:150px;" id='type'>
                                
                                <option value=#>Please choose</option>
                                <option value=2019>2019</option>
                                <option value=2018>2018</option>
                                <option value=2017>2017</option>
                                <option value=2016>2016</option>
                                <option value=2015>2015</option>
                                <option value=2014>2014</option>
                            </select>
                            </div>
                    </div>
                    

                    
                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                    <div id="app">
            {!! $chart->container() !!}
        </div>
       
        {!! $chart->script() !!}

        <table class="table table-striped">

<thead>
    <tr>
    <th scope="col">Years</th>
    <th scope="col">Revenue generated(RM)</th>
    <th scope="col">Total tickets sold</th>
    
    


    
    </tr>
</thead>
<tbody>
@foreach($sort_sum_years as $ticket)
<tr>

<td> {{$ticket->years}}</td> 
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