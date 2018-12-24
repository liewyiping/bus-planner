<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
   <div class="form-group row">
    <label for="bus_id" class="col-md-4 col-form-label text-md-right">{{ __('Choose bus') }}</label>

        <div class="col-md-6">
    <select class="form-control input-lg dynamic" name='bus_id' id='bus_id' data-dependant="route_id" >
        
    @foreach($buses as $bus)
            <option value="{{ $bus->bus_id}}">{{$bus->bus_id}}</option>
    @endforeach
    </select>
    </div>
</div>

<div class="form-group row">
    <label for="route_id" class="col-md-4 col-form-label text-md-right">{{ __('Route options') }}</label>

    <div class="col-md-6">
    
    <select class="form-control input-lg" name='route_id' id='route_id'>                                
    <option value="">Select Route</option>
    </select>

    </div>
    
</div>
   {{ csrf_field() }}
   <br />
   <br />
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
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#bus_id').change(function(){
  $('#route_id').val('');

 });


 

});
</script>
