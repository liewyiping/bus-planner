<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bus Planner System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url('../img/kl_bg.jpg');
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                overflow: hidden;
            }

            .header-colour {
                background-color: white;
                border-radius: 0;
            }

            .search-wrap {
                margin-top: 50px;
                margin-bottom: 15px;
                padding: 15px 0 15px 0;
                background: rgba(35, 30, 38, 0.9);
                color: #fff;
                font-size: 13px;
                z-index: 99;
            }

            .search-wrap .notice-info {
                border-radius: 5px;
                /*padding: 5px;*/
                margin-bottom: 20px;
                background-color: rgba(0, 0, 0, 0.5);
            }

            .full-height {
                height: 40vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: center;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #000000;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}

            input[type=text],  select, textarea {
                width: 100%;
                height: 50%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=date]{
                width: 100%;
                height: 50%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                resize: vertical;
            }

            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            .container {
                border-radius: 5px;
                padding: 20px;
            }

            /* To create equal column */

            * {
                box-sizing: border-box;
            }

            /* Create four equal columns that floats next to each other */
            .column {
                float: left;
                width: 25%;
                padding: 10px;
                height: 90px; /* Should be removed. Only for demonstration */
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* For Bottom Navigation Bar */
            .navbar_bottom {
                overflow: hidden;
                background-color: #00FF00;
                bottom: 0;
                width: 100%;
            }

            .navbar_bottom a {
                float: left;
                display: block;
                color: #000000;
                text-align: center;
                padding: 5px 16px;
                text-decoration: none;
                font-size: 17px;
            }

            .navbar_bottom a:hover {
                background: #f1f1f1;
                color: black;
            }

            .navbar_bottom a.active {
                background-color: #4CAF50;
                color: white;
            }

            .header {
                padding-bottom: 9px;
                margin: 10px 0 20px;
                border-bottom: 1px solid #eee;
            }

            button {
                width: 100%;
                height: 50%;
            }

        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>

    <body>
        <div class="navbar navbar-expand-md navbar-light navbar-laravel header-colour" style="margin-bottom: 0" id="">
            <ul class="nav navbar-nav">
                <li class="links"><a href="{{ url('/') }}">Bus Planner System</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            
                <li class="collapse navbar-collapse links">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item links">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item links">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown links">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right links" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest   
                </li>

                <li class="links"><a href="/contact">Contact Us</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->

<!--         <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">

                <a href="/"><img src="/img/logo.jpg" style="width: 400px; height: 200px; margin-right: auto; margin-left: auto; display: block; "></a>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="container search-wrap">
                <div class="header">
                    <h4>Bus Ticket</h4>
                </div>

                <div class="form-group">
                <form action="/home" method="POST" role="search">
                      {{ csrf_field() }}

                        <div class="col-sm-12">
                            <div class="notice-info">
                                <ul>
                                    <li><text>Malaysia: During partial/full lock-down, inter-state or district travel are allowed with MITI or police authorization letter.</text></li>
                                </ul>
                            </div>
                        </div>
                        <div class="column">
                            <label for="from">From</label>
                            <select id="" class="form-control" name="search_origin" required>
                                <option value="">Bus: Origin</option>
                                @foreach(busplannersystem\Route::all()->unique('origin_terminal') as $route_list)
                                <option  class="option "value="{{$route_list->origin_terminal}}">{{$route_list->origin_terminal}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="column">
                            <label for="from">To</label>
                            <select id="" class="form-control" name="search_destination" required>
                                <option value="">Bus: Destination</option>
                                @foreach(busplannersystem\Route::all()->unique('destination_terminal') as $route_list)
                                <option  class="option "value="{{$route_list->destination_terminal}}">{{$route_list->destination_terminal}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Malaysia Time Zone UTC +8-->
                        <?php
                            date_default_timezone_set("Asia/Kuala_Lumpur");
                        ?>

                        <div class="column">
                            <label for="departure">Departure Date</label>
                            <input value="{{ date('Y-m-d') }}" type="date" class="form-control" name="search_date" placeholder="Search date" required> <span class="input-group-btn">
                        </div>

                        <div class="column">
                            <label for="">&nbsp;</label>
                            <button type="submit" class="btn btn-success">
                            <span class="button glyphicon glyphicon-search"> Search </span>
                            </button>
                            
                        </div>
                      
                </form>
                </div>
            </div>
        </div>

        <br><br><br>

        <div class="container carousel carousel-showmanymoveone slide" id="homeCarousel">
               
            <div class="carousel-inner">
                <div class="item active left">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <img src="/img/ldls.png" alt="Unifi" style="width:100%; height:150px;">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 cloneditem-1">
                        <img src="/img/sssh.jpg" alt="Nike" style="width:100%; height:150px;">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 cloneditem-2">
                        <img src="/img/mp.jpeg" alt="Polident" style="width:100%; height:150px;">
                    </div>
                </div>
                <div class="item next left">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <img src="/img/sssh.jpg" alt="Nike" style="width:100%; height:150px;">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 cloneditem-1">
                        <img src="/img/mp.jpeg" alt="Polident" style="width:100%; height:150px;">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 cloneditem-2">
                        <img src="/img/cm.jpg" alt="Christmas" style="width:100%; height:150px;">
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#homeCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#homeCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>
    </body>
</html>

<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('index.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('#'+dependent).html(result);
                    }
                })
            }
        });
    });
</script>
