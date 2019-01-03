@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="clear: both">
                    <h6 style="float: left; margin:5px;">Financial Analytics Dashboard &nbsp;<strong>|</strong>&nbsp; Operator ID: {{ $operator_id }}</h6>
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

                            
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection