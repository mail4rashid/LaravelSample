@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Student
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('students.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Student Name:</label>
              <input type="text" class="form-control" name="student_name"/>
          </div>
          <div class="form-group">
              <label for="rollno">Student Roll No :</label>
              <input type="text" class="form-control" name="student_rollno"/>
          </div>
          <div class="form-group">
              <label for="marks">Student Marks:</label>
              <input type="text" class="form-control" name="student_marks"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection