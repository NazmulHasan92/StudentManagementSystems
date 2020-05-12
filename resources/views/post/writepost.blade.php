@extends('home')

@section('content')
    <div class="container">
         <div class="col-lg-8 col-md-10 mx-auto">
       
        <a href="{{ route('addsubject') }}" class=" btn btn-danger">Add Subject</a>
        <a href="{{ route('allsubjects') }}" class=" btn btn-success">All Subjects</a>
        <a href="{{ route('allposts') }}" class=" btn btn-success">All Post</a>

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
   
        <form action="{{ route('stores') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Title" name="title" required >
            </div>
          </div>
          
          <br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Subjects</label>
              <select class="form-control" name="subject_id">

                @foreach($subject as $row)
              	<option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach()	

              </select>
            </div>
          </div>

          <br>

          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control"  required name="image">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Details"  required name="details"></textarea>
            </div>
          </div>

          <br>

          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>

@endsection