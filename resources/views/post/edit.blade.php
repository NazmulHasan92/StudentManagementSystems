@extends('home')

@section('content')
    <div class="container">
         <div class="col-lg-8 col-md-10 mx-auto">
       
        <a href="{{ route('addsubject') }}" class=" btn btn-danger">Add Subject</a>
        <a href="{{ route('allsubjects') }}" class=" btn btn-success">All Subjects</a>

        <hr>

           @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
          @endif
   
        <form action="{{ url('update/subject/'.$subject->id ) }}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Subject Name</label>
              <input type="text" class="form-control" value="{{ $subject->name }}"  name="name"  >
            </div>
          </div>

          <br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
               <label>Slug Name</label>
               <input type="text" class="form-control" value="{{ $subject->slug }}" name="slug"  >
             </div>
          </div>

          <br>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>

@endsection