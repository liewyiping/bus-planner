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
                            
                            <label for="date_start" class="col-md-4 col-form-label text-md-right">{{ __('Date Start') }}</label>   
                            
                            <div class="col-md-6">
                                <input id="date_start" type="date" class="form-control{{ $errors->has('date_start') ? ' is-invalid' : '' }}" name="date_start" value="{{ old('date_start') }}" required autofocus>

                                @if ($errors->has('date_start'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            
                            <label for="date_end" class="col-md-4 col-form-label text-md-right">{{ __('Date End') }}</label>   
                            
                            <div class="col-md-6">
                                <input id="date_end" type="date" class="form-control{{ $errors->has('date_end') ? ' is-invalid' : '' }}" name="date_end" value="{{ old('date_end') }}" required autofocus>

                                @if ($errors->has('date_end'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_end') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <label for="ads_time_start" class="col-md-4 col-form-label text-md-right">{{ __('Advertisement Starting Time') }}</label>

                                <div class="col-md-6">
                                <input id="ads_time_start" type="time" class="form-control{{ $errors->has('ads_time_start') ? ' is-invalid' : '' }}" name="ads_time_start" value="{{ old('ads_time_start') }}" required autofocus>

                                @if ($errors->has('ads_time_start'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ads_time_start') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div> 

                         <div class="form-group row">
                            
                            <label for="ads_time_end" class="col-md-4 col-form-label text-md-right">{{ __('Advertisement End Time') }}</label>

                                <div class="col-md-6">
                                <input id="ads_time_end" type="time" class="form-control{{ $errors->has('ads_time_end') ? ' is-invalid' : '' }}" name="ads_time_end" value="{{ old('ads_time_end') }}" required autofocus>

                                @if ($errors->has('ads_time_end'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ads_time_end') }}</strong>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
