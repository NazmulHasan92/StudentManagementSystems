@extends('home')

@section('content')
    <div class="container">
         <div class="col-lg-8 col-md-10 mx-auto">
       
        <a href="{{ route('addsubject') }}" class=" btn btn-danger">Add Subject</a>
        <a href="{{ route('allsubjects') }}" class=" btn btn-success">All Subjects</a>

        <hr>
        
         <div>
           <ol>
           <li>Subject Name: {{ $sub->name }}</li>
           <li>Slug Name: {{ $sub->slug }}</li>
           <li>Created At: {{ $sub->created_at }}</li>
         </ol>
         </div>

      </div>
    </div>

@endsection