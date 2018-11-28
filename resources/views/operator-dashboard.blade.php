@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Operator Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>Operator</strong>!
                    <br>
                    <div align="center">

                        <br>
                        
                        <a href="{{ url('/operator/new-application') }}">
                        <input type="button" class="btn btn-primary" value="Verify Account"/>
                        </a>
                        
                        <a href="{{ url('/operator/insert-bus-info') }}">
                        <input type="button" class="btn btn-primary" value="Insert Bus"/>
                        </a>

                        <a href="{{ url('/operator/view-bus-info') }}">
                        <input type="button" class="btn btn-primary" value="View Bus"/>
                        </a>

                        <a href="{{ url('/operator/insert-route-info') }}">
                        <input type="button" class="btn btn-primary" value="Insert Route (Bus)"/>
                        </a>

                        <a href="{{ url('/operator/insert-trip-info') }}">
                        <input type="button" class="btn btn-primary" value="Insert Trip"/>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection