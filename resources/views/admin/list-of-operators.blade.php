@extends('layouts.app')

@section('content')

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/home') }}">
                        <input type="button" class="btn btn-primary" value="Back"/>
                    </a>
                    
                    <h5 align="center"><strong>List of Operators</strong></h5>
                </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                        {{-- <form method="POST" action="{{ route('applicationForm.approved.submit') }}" enctype="multipart/form-data">--}}
                                @csrf           


                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Application ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Resume(PDF)</th>
                                <th scope="col">License(PDF)</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                                </tr>

                            </thead>
                            <tbody>
                               
                               @if( ! $application_forms->isEmpty())
                                @foreach($application_forms as $application_form)
                                <tr>
                                <!-- <th><label><input  id="{{ $application_form->id }}"  class="id-select" type="checkbox"  name="id[]" class="checkmark" /></label> </th> -->

                                <!-- <th scope="row">{{$application_form->id}}</th> -->
                                <td scope="row"><a href="/admin/application-forms/{{$application_form->id}}">{{$application_form->id}}</td>
                                <td>{{$application_form->name}} </td>
                                <td>{{$application_form->email}} </td>
                                <!-- <td>{{$application_form->company_id}} </td> -->
                                <td><a href="<?php echo asset("storage/operator_resume/$application_form->operator_resume_link")?>">{{basename($application_form->operator_resume)}}</a></td> 
                                <td><a href="<?php echo asset("storage/operator_license/$application_form->operator_license_link")?>">{{basename($application_form->operator_license)}}</a></td> 
                                <td>{{$application_form->status}} </td>
                                </tr>
                                @endforeach
                                @endif 
                                

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection  

