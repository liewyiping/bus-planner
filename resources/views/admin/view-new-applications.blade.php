@extends('layouts.app')

@section('content')

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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


                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col"></th>
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
                                <th><label><input  id="{{ $application_form->id }}"  class="id-select" type="checkbox"  name="id[]" class="checkmark" /></label> </th>    
                                <th scope="row">{{$application_form->id}}</th>
                                <td>{{$application_form->name}} </td>
                                <td>{{$application_form->email}} </td>
                                <td>{{$application_form->company_name}} </td>
                                <td><a href="<?php echo asset("storage/operator_resume/$application_form->operator_resume_link")?>">{{basename($application_form->operator_resume)}}</a></td> 
                                <td><a href="<?php echo asset("storage/operator_license/$application_form->operator_license_link")?>">{{basename($application_form->operator_license)}}</a></td> 
                                </tr>

                                @endforeach
                                @endif

                            </tbody>
                        </table>
                        <tr><input type="submit" class="btn btn-primary" value="APPROVE"></tr>
                        <tr><input type="submit" class="btn btn-primary" value="REJECT"></tr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection  