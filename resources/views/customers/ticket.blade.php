<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <title>View Ticket | Bus Planner System</title>
        <!-- Styles etc. -->
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
                /*height: 110px; /* Should be removed. Only for demonstration */
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
    </head>
    <body>
        <div class="row">
            <div class="container">
                <div class="page-header">
                    <h2 align="center">Bus Planner System</h2>
                </div>

        <div class="flex-center position-ref full-height">
            <div class="content">
                @foreach ($allTickets as $ticket)

                <div class="row">
                    <div class="column">
                        <div align="left"><td>Ticket ID:</td></div>
                        <div align="left"><td>Total Price:</td></div>
                        <div align="left"><td>Bus Company ID:</td></div>
                    </div>

                    <div class="column">
                        <div align="left"><td>{{ $ticket->ticketID }}</td></div>
                        <div align="left"><td>RM {{ $ticket->priceTot }}</td></div>
                        <div align="left"><td>{{ $ticket->busCompanyID }}</td></div>
                    </div>
                </div>

                @endforeach

                <div class="row" align="left">
                    <h3>Booking Details</h3>
                    <hr>
                    <div>
                        <table>
                            <thead>
                                <td>Route ID</td>
                                <td>| Bus ID</td>
                                <td>| Destination</td>
                                <td>| Depart</td>
                                <td>| Number of Booked Seat</td>
                                <td>| Seat Number</td>
                                <td>| Date</td>
                                <td>| Time</td>
                            </thead>

                            <tbody>
                                @foreach ($allTickets as $ticket)
                                <tr>
                                    <td class="inner-table">{{ $ticket->routeID }}</td>
                                    <td class="inner-table">| {{ $ticket->busID }}</td>
                                    <td class="inner-table">| {{ $ticket->destination }}</td>
                                    <td class="inner-table">| {{ $ticket->depart }}</td>
                                    <td class="inner-table">| {{ $ticket->bookedTot }}</td>
                                    <td class="inner-table">| {{ $ticket->seatNo }}</td>
                                    <td class="inner-table">| {{ $ticket->date }}</td>
                                    <td class="inner-table">| {{ $ticket->time }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>

                <form method="POST">
                    <button type="submit">Submit</button>
                    <button type="cancel">Cancel</button>
                </form>
            </div>
        </div>
    </body>
    </html>