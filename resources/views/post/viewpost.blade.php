@extends('home')

@section('content')
    <div class="container">
    	<div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

            	<div>
 
            			<h1>Subject Name: {{ $post->name }}</h1>
            			<h3>{{ $post->title }}</h3>
            			<img src="{{ URL::to($post->image) }}" height="300px;">
            			<p>{{ $post->details }}</p>

                        <hr><br>
                         <a href="{{ route('allposts') }}" class=" btn btn-success">Back-></a>
            		
            	</div>
            </div>	
       </div>
    </div>     	

@endsection         	