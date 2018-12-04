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
                    
                    <h5 align="center"><strong>List of operators new applications</strong></h5>
                </div>

            <div class="card-body">
             {{--<form method="POST" action="{{ route('program.page.submit') }}" enctype="multipart/form-data">--}}
                        @csrf           

                      


                         

                        

                       
                
            </div>
        </div>
    </div>
</div>
@endsection  