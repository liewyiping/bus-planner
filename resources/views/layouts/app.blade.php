
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use busplannersystem\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bus Planner System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/vue"></script>
    <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
          <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
.dropbtn {
  
  border: none;
  height: 30px;

  color: #636b6f;
  padding: 0 25px;
  font-size: 12px;
  font-weight: 600;
  letter-spacing: .1rem;
  text-decoration: none;
  text-transform: uppercase;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

/*.dropdown:hover .dropbtn {background-color: #3e8e41;}*/

        .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

        /* For Bottom Navigation Bar */
            .navbar_bottom {
                overflow: hidden;
                background-color: #00FF00;
                position: fixed;
                bottom: 0;
                width: 100%;
            }

            .navbar_bottom a {
                float: left;
                display: block;
                color: #f2f2f2;
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
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <ul class="nav navbar-nav">
                @guest
                    <li class="links"><a href="/"><img src="/img/logo.jpg" style="width: 100px; height: 50px;"></a></li>
                @else
                @if (Auth::user()->role == 'customer')
                    <li class="links"><a href="/"><img src="/img/logo.jpg" style="width: 100px; height: 50px;"></a></li>
                    <li class="links" style="padding: 12px;"><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="links" style="padding: 12px;"><a href="{{ url('/customer/records') }}">Booking Records</a></li>
                   

                <!--upcoming trip-->

                        <!-- Malaysia Time Zone UTC +8-->
                        <?php
                            date_default_timezone_set("Asia/Kuala_Lumpur");
                        ?>
                    <li>
                        <div class="dropdown" style="padding: 9px;">
                        <button class="dropbtn">Your Upcoming Trip</button>
                        <div class="dropdown-content">
   
                         <?php
                         $user_id= Auth::user()->user_id;
                         $ticket=Ticket::where('user_id',$user_id)->get();
                         
                          foreach ($ticket as $ticket)
                          {
                           if ($ticket -> date_depart >= date("Y-m-d")) 
                           { ?>
                              <a href="/showticket/{{$ticket->ticket_id}}">

                            <table style="width:100%">
                            <li class="dropdown-item" style="min-width: 530px"  > 
                            <tr style="color: grey">
                              <th>Ticket ID:</th>
                              <th>Date of Departure:</th>
                              <th>Time of Departure:</th>
                            </tr>
                            <tr>
                              <th><u style=" cursor:grabbing"; id="showticket" onclick="showticket()" value="{{ $ticket -> ticket_id }}" > {{ $ticket -> ticket_id }}</u>  </th>
                              <th> {{ $ticket -> date_depart }}</th>
                              <th> {{ $ticket -> time_depart }} </th>
                             </tr>
                           </li>
                           </table>
                              </a>
                     <?php  }

                          } ?>

   
                        </div>
                        </div>
                    </li>

                @else
                    <li class="links"><a href="/home"><img src="/img/logo.jpg" style="width: 100px; height: 50px;"></a></li>
                    <li class="" style="padding: 13px;"><a></a></li>
                    <li class="" style="padding: 13px;"><a><i>Welcome to Bus Planner System</i></a></li>
                @endif
                @endguest
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            @if (Auth::user()->role == 'customer')
                            <li class="links" style="padding: 12px;"><a>Point: {{ Auth::user()->point }}</a></li>
                            <li class="links nav-item dropdown" style="margin:15px;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                            @else
                            <li class="links nav-item dropdown" style="margin:15px;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- <div class="navbar_bottom">
        <a href="{{ url('/') }}" class="active">Home</a>
        <a href="{{ url('/operator/login') }}">Operator Login</a>
        <a href="{{ url('/operator/registration') }}">Operator Register</a>
    </div> -->
</body>
</html>
