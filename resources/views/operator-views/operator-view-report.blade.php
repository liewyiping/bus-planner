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
                    
                    <h5 align="center"><strong>Operator Report</strong></h5>
                </div>

                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div align="center">

                        <a href="{{ url('/operator/popular_date_line_chart') }}">
                        <input type="button" class="btn btn-primary" value="Popular Date"/>
                        </a>

                        <a href="{{ url('/operator/popular_destination_donut_chart') }}">
                        <input type="button" class="btn btn-primary" value="Popular Destination"/>
                        </a>

                        <a href="{{ url('/laravel_google_chart') }}">
                        <input type="button" class="btn btn-primary" value="Popular Bus Company"/>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection