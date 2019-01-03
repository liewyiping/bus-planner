@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <div>&nbsp;You are logged in as <strong>Admin</strong></div>
                    <br>
                    <div align="center">
                        <a href="{{ url('/admin/view-new-operator-application') }}">
                        <input type="button" class="btn btn-primary" value="View Operator Application"/>
                        </a>
                        
                        <a href="{{ url('/admin/list-of-operators') }}">
                        <input type="button" class="btn btn-primary" value="View Operator List"/>
                        </a>
                        
                        <a href="{{ url('/laravel_google_chart') }}">
                        <input type="button" class="btn btn-primary" value="View Operator Application"/>
                        </a>
                    </div>
                    <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection