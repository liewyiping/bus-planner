@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact US</div>

                <div class="card-body" align="center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5><strong>Bus Planner System Sdn. Bhd.</strong></h5>
                    <div>
                    <strong><u>Liew Yi Ping </u></strong><br>
                        A160719@siswa.ukm.edu.my
                        <br>
                        +6 011-2369 9913
                        <br>
                    </div>
                    
                    <div>
                    <strong><u>Muhammad Syazany </u></strong><br>
                        A162016@siswa.ukm.edu.my
                        <br>
                        +6 019-375 6558
                        <br>
                    </div>

                    <div>
                    <strong><u>Nayli Fatini </u></strong><br>
                        A160500@siswa.ukm.edu.my
                        <br>
                        +6 013-599 5944
                        <br>
                    </div>

                    <div>
                    <strong><u>Izleen Faqihah </u></strong><br>
                        A160362@siswa.ukm.edu.my
                        <br>
                        +6 019-635 2044
                        <br>
                    </div>

                    <div>
                    <strong><u>Joanne Lai</u></strong><br>
                        A161226@siswa.ukm.edu.my
                        <br>
                        +6 016-532 1363
                        <br>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection