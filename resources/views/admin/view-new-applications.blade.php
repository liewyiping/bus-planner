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

                      
<h4> List of new applications  </h4>


<table class="table table-striped">

<thead>
    <tr>
    <th scope="col">Application ID</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Company name</th>
    <th scope="col">Resume(PDF)</th>
    <th scope="col">License(PDF)</th>



    
    </tr>
</thead>
<tbody>

 <!-- <table class="table  table-striped"> -->

@if( ! $application_forms->isEmpty() )
@foreach($application_forms as $application_form)
<tr>
<th scope="row">{{$application_form->id}}</th>
<td>{{$application_form->name}} </td>
<td>{{$application_form->email}} </td>
<td>{{$application_form->company_name}} </td>
<td><a href="<?php echo asset("storage/operator_resume/$application_form->operator_resume_link")?>">{{basename($application_form->operator_resume)}}</td> 
<td><a href="<?php echo asset("storage/operator_license/$application_form->operator_license_link")?>">{{basename($application_form->operator_license)}}</td> 

            



</tr>
@endforeach
@endif
</tbody>
</table>


                        

                         

                        

                       
                
            </div>
        </div>
    </div>
</div>
@endsection  