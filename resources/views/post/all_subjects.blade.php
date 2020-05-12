@extends('home')

@section('content')
    <div class="container">
         <div class="col-lg-8 col-md-10 mx-auto">
       
        <a href="{{ route('addsubject') }}" class=" btn btn-danger">Add Subject</a>
        <a href="{{ route('allsubjects') }}" class=" btn btn-success">All Subjects</a>

        <hr>
        
        <table class="table table-responsive">

          <tr>
            <th>SL</th>
            <th>Subject Name</th>
            <th>Slug Name</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
           
           @foreach($subject as $row)

          <tr>
             <td>{{ $row->id }}</td>
             <td>{{ $row->name }}</td>
             <td>{{ $row->slug }}</td>
             <td>{{ $row->created_at }}</td>
             <td>
               <a href="{{ URL::to('edit/subject/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
               <a href="{{ URL::to('view/subject/'.$row->id) }}" class="btn btn-sm btn-success">View</a>
               <a href="{{ URL::to('delete/subject/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
             </td>
          </tr>

          @endforeach

        </table>
      </div>
    </div>

@endsection