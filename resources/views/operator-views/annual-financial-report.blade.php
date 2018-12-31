@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="clear: both">
                    <h6 style="float: left; margin:5px;">Annual report for year {{$year_report}} </h6> 
                </div>

                <div class="card-body">

                <h5>Total revenue for {{$year_report}} :RM {{$total_revenue_year}} </h5>

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
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection