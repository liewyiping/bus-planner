@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style='width:60rem;'>
                <div class="card-header">
                    <a href="{{ url('/home') }}">
                        <input type="button" class="btn btn-primary" value="Back"/>
                    </a>
                    
                    <h5 align="center"><strong>Advertisement Block Schedule</strong></h5>
                </div>

                <div class="card-body">
                   
                    <form method="POST" action="{{ route('admin.insertAds.submit') }}" enctype="multipart/form-data">
                        @csrf

                

                       

                         <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
                            <div class="col-md-6">
                            <select class=”form-control” name='company_name' style="width:330px;" id='company_name'>
                                
                            @foreach ($companies as $company)
                            <option value="{{$company->bus_company_id}}">{{$company->bus_company_name}}</option>
                            @endforeach
                               


                              
                              
                            </select>
                            </div>

                        </div>

                           <div class="form-group row">
                            
                            <label for="datetime_start" class="col-md-4 col-form-label text-md-right">{{ __('Date/Time Start') }}</label>   
                            
                            <div class="col-md-6">
                                <input id="datetime_start" type="datetime-local" class="form-control{{ $errors->has('datetime_start') ? ' is-invalid' : '' }}" name="datetime_start" value="{{ old('datetime_start') }}" required autofocus>

                                @if ($errors->has('datetime_start'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('datetime_start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            
                            <label for="datetime_end" class="col-md-4 col-form-label text-md-right">{{ __('Date/Time End') }}</label>   
                            
                            <div class="col-md-6">
                                <input id="datetime_end" type="datetime-local" class="form-control{{ $errors->has('datetime_end') ? ' is-invalid' : '' }}" name="datetime_end" value="{{ old('datetime_end') }}" required autofocus>

                                @if ($errors->has('datetime_end'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('datetime_end') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                          <div class="form-group row">
                            <label for="banner_image_ads" class="col-md-4 col-form-label text-md-right">{{ __('Banner Image File') }}</label>

                            <div class="col-md-6">
                                <input id="banner_image_ads" type="file" class="form-control{{ $errors->has('banner_image_ads') ? ' is-invalid' : '' }}" name="banner_image_ads" value="{{ old('banner_image_ads') }}" required autofocus>

                                @if ($errors->has('banner_image_ads'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('banner_image_ads') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        
                      

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add new ads slot') }}
                                </button>
                            </div>
                        </div>

                        <br>

                        <table class="table table-striped">

<thead>
    <tr>
    <th scope="col">Advertisement ID</th>
    <th scope="col">Company name</th>
    <th scope="col">Date/Time Start</th>
    <th scope="col">Date/Time End</th>
    <th scope="col">Duration(Hours)</th>
    <th scope="col">Banner image link</th>
    <th scope="col">Status</th>
    <th scope="col">Created at</th>




    
    </tr>
</thead>
<tbody>

 <!-- <table class="table  table-striped"> -->

@if( ! $advertisements->isEmpty() )
@foreach($advertisements as $ad)
<tr>
<th scope="row">{{$ad->advertisement_id}}</th>
<td>{{$ad->company_name}} </td>
<td>{{$ad->datetime_start}} </td>
<td>{{$ad->datetime_end}} </td>
<td>{{$ad->duration}} </td>
<td><a href="<?php echo asset("storage/banner_image_ads/$ad->banner_image_ads_link")?>">{{basename($ad->banner_image_ads)}}</td> 
<td>{{$ad->status}} </td>
<td>{{$ad->created_at->format('h:i a d/m/Y')}} </td>


            



</tr>
@endforeach
@endif
</tbody>
</table>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
