<!DOCTYPE html>

<html>

<head>

    <title>Laravel Dependent Dropdown Example with demo</title>

    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

</head>

<body>


<div class="container">

    <div class="panel panel-default">

      <div class="panel-heading">Select State and get bellow Related City</div>

      <div class="panel-body">

            <div class="form-group">

                <label for="title">Select Bus:</label>

                <select name="bus" class="form-control" style="width:350px">

                    <option value="">--- Select Buses ---</option>

                    @foreach ($buses as $key => $value)

                        <option value="{{ $key }}">{{ $value }}</option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label for="title">Select Route:</label>

                <select name="route" class="form-control" style="width:350px">

                </select>

            </div>

      </div>

    </div>

</div>


<script type="text/javascript">

    $(document).ready(function() {

        $('select[name="bus"]').on('change', function() {

            var bus_id = $(this).val();

            if(bus_id) {

                $.ajax({

                    url: '/myform/ajax/'+bus_id,

                    type: "GET",

                    dataType: "json",

                    success:function(data) {


                        

                        $('select[name="route"]').empty();

                        $.each(data, function(key, value) {

                            $('select[name="route"]').append('<option value="'+ key +'">'+ value +'</option>');

                        });


                    }

                });

            }else{

                $('select[name="route"]').empty();

            }

        });

    });

</script>


</body>

</html>