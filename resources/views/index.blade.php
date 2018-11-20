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
                background-image: url('../img/bg.jpg');
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                height: 110px; /* Should be removed. Only for demonstration */
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

        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>

    <body>

        <div class="navbar navbar-expand-md navbar-light navbar-laravel" id="bs-example-navbar-collapse-1 top-right links">
            <ul class="nav navbar-nav">
                <li class="links"><a href="/">Bus Planner System</a></li>
                <li>
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

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                
                <img src="/img/logo.jpg" style="width: 500px; height: 220px; margin-right: auto; margin-left: auto; display: block; ">

                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="page-header">
                    <h4>Bus Ticket</h4>
                </div>

                <div class="form-group">
                    <form action="/action_page.php">
                        <label for="trip">Trip</label>
                        <div class="radio" id="select_route">
                            <label><input name="route" type="radio" id="sway" value="single" checked> One Way</label>
                            <label></label>
                            <label><input name="route" type="radio" id="rway" value="return"> Route Way</label>
                        </div>

                        <div class="column" style="background-color:#228B22;">
                            <label for="from">From</label>
                            <select id="origin" name="origin" class="form-control input-lg dynamic" data-dependent="destination">
                                
                                <option value="">Select Origin</option>
                                @foreach($route_list as  $origin)

                                <option value="{{ $origin->origin}}">{{ $origin->origin}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="column" style="background-color:#228B22;">
                            <label for="to">To</label>
                            <select id="destination" name="destination" class="form-control input-lg">

                                <option value="">Select Destination</option>

                            </select>
                        </div>

                        {{ csrf_field() }}

                        <div class="column" style="background-color:#228B22;">
                            <label for="departure">Departure Date</label>
                            <input type="date" id="departure" name="departure" required>
                        </div>

                        <div class="column" style="background-color:#228B22;">
                            <label for="return">Return Date</label>
                            <input type="date" id="return" name="return" required="">
                        </div>
                        <!-- <input type="submit" value="Submit"> -->
                    </form>
                </div>
            </div>
        </div>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <h1>Coming Soon</h1>

            </div>
        </div>
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
