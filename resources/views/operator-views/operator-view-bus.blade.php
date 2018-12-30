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

                    <a href="{{ url('/operator/insert-bus-info') }}">
                        <input type="button" class="btn btn-primary" value="Insert bus"/>
                    </a>
                    
                    <h5 align="center"><strong>Bus Information</strong></h5>
                </div>
<br>


@if (count($buses)>0)
<div align="center">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for registered bus">
</div>
                        
<table class="table table-striped" id='myTable'>

<thead>
<tr>
<th scope="col">Bus ID</th>  
<th scope="col">Registration Plate</th>  
<th scope="col">Number of seats</th>
<th scope="col">Operator ID</th>
<th scope="col">Added on</th>
<th scope="col"></th>
<th scope="col"></th>
<!-- <th scope="col">Modify bus info</th>  
<th scope="col">Delete bus</th>   -->

               </tr>
           </thead>
           <tbody>
           
           @foreach($buses as $bus)
           <tr>
           <th scope="row">{{$bus->bus_id}}</th> 
           <td>{{$bus->registration_plate}}</td>
          <td>{{$bus->total_seat}}</td>
          <td>{{$bus->operator_id}}</td>
          <td>{{$bus->created_at->format('h:i a d/m/Y')}}</td>
          <td>  <a href="{{route('bus.edit', ['bus' =>$bus->bus_id])}}" class="btn btn-primary">Edit</a></td>
          <td>  <a href="{{route('bus.destroy', ['bus' =>$bus->bus_id])}}" class="btn btn-danger">Delete</a></td>
          
           </tr>
           @endforeach

           </tbody>
           </table>



           @else

           <p> No buses were found </p>

           @endif
   </div>
</div>
</div>



</div>

<script>
function myFunction() {
// Declare variables
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
table = document.getElementById("myTable");
tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[0];
if (td) {
txtValue = td.textContent || td.innerText;
if (txtValue.toUpperCase().indexOf(filter) > -1) {
tr[i].style.display = "";
} else {
tr[i].style.display = "none";
}
}
}
}
</script>




@endsection