@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="clear: both">
                    <h6 style="float: left; margin:5px;">Financial Analytics Dashboard &nbsp;<strong>|</strong>&nbsp;
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  
                    <br>
                    <div align="center">
                    </div>

                    <div class="form-group row">
                            <label for="year-selected" class="col-md-4 col-form-label text-md-right">{{ __('Choose year report') }}</label>

                            <div class="col-md-6">
                            <select class=”form-control” name='type' style="width:150px;" id='type'>
                                
                                <option value=#>Please choose</option>
                                <option value=2018>2018</option>
                                <option value=2017>2017</option>
                                <option value=2016>2016</option>
                                <option value=2015>2015</option>
                                <option value=2014>2014</option>
                            </select>
                            </div>
                        </div>

                        <div id="app">
            {!! $chart->container() !!}
        </div>
        <script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $chart->script() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection