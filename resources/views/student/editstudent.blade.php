@extends('home')

@section('content')
    <div class="container">
         <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{ route('allstudent') }}" class=" btn btn-success">All Students</a>

        <hr>
        <br>
          <h3>Student Update</h3>

           @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
          @endif
   
        <form action="{{ url('update/student/'.$student->id) }}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" value="{{ $student->name }}" name="name"  >
            </div>
          </div>

          <br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
               <label>Student Email</label>
               <input type="email" class="form-control" value="{{ $student->email }}" name="email">
             </div>
          </div>

          <br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
               <label>Phone No</label>
               <input type="number" class="form-control" value="{{ $student->phone }}" name="phone"  >
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