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

                      
                      <div class="row">
                    <div class="column">
                      <img src="="<?php echo asset("storage/banner_image_ads/$banner_image_ads_link")?>"" alt="Snow" style="width:100%">
                    </div>
                    <div class="column">
                      <img src="img_forest.jpg" alt="Forest" style="width:100%">
                    </div>
                    <div class="column">
                      <img src="img_mountains.jpg" alt="Mountains" style="width:100%">
                    </div>
        </div> 

                         

                        

                       
                
            </div>
        </div>
    </div>
</div>
@endsection  