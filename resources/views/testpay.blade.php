@extends('layouts.app')

@section('content')
<body>
	<form method="post" action="{{ action('CreateSeatController@store') }}" >

		<input type="hidden" name="totalprice" value="{{ $totalprice }}">
		 <div> <input type='submit' name="submit" class='btn btn-primary' value="submit" id="submit"  />  </div>
		
	</form>
	
</body>



@endsection