@extends('home')

@section('content')
    <div class="container">
    	<div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

            	<div>
 
            			<h1>Student Name: {{ $student->name }}</h1>
            			<h3>Student Email: {{ $student->email }}</h3>
            			<h2>Phone No: {{ $student->phone }}</h2>

                        <hr><br>
                         <a href="{{ route('allstudent') }}" class=" btn btn-success">Back-></a>

            	</div>
            </div>	
       </div>
    </div>     	

@endsection         	