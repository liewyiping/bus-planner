@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                
                    <div>&nbsp;You are logged in as <strong>Admin</strong></div>
                    <br>
                    <div align="center">
                        <a href="{{ url('/admin/view-new-operator-application') }}">
                        <input type="button" class="btn btn-primary" value="View Operator Application"/>
                        </a>
                        
                        <a href="{{ url('/admin/insert-new-terminal') }}">
                        <input type="button" class="btn btn-primary" value="Insert New Terminal"/>
                        </a>
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection