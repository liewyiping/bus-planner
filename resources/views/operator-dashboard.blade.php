@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="clear: both">
                    <h6 style="float: left; margin:5px;">Operator Dashboard &nbsp;<strong>|</strong>&nbsp; Operator ID: {{ $operator_id }}</h6>
                    <h6 style="float: right; margin:5px;">Company ID: {{ $company_id }}</h6>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- You are logged in as <strong>Operator</strong>!<br><br> -->
                    <!-- Company ID : <strong>{{ $company_id }}</strong><br> -->
                    Company Name : <strong>{{ $company_name }}</strong><br>
                    Address : <strong>{{ $company_address }}</strong>
                    <br>
                    <div align="center">

                        <br>
                        
                        <a href="{{ url('/operator/insert-bus-info') }}">
                        <input type="button" class="btn btn-primary" value="Insert Bus"/>
                        </a>

                        <a href="{{ url('/operator/view-bus-info') }}">
                        <input type="button" class="btn btn-primary" value="View Bus"/>
                        </a>

                        <a href="{{ url('/operator/insert-trip-info') }}">
                        <input type="button" class="btn btn-primary" value="Insert Trip"/>
                        </a>

                        <a href="{{ url('/operator/report') }}">
                        <input type="button" class="btn btn-primary" value="View Report"/>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection