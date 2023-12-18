@extends('layout')

@section('content')

<style>

  .uper {

    margin-top: 40px;

  }

</style>

<div class="card uper">

  <div class="card-header">

    Add Student Data

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

      <form method="post" action="{{ route('students.store') }}"  enctype="multipart/form-data">

          <div class="form-group">

              @csrf

              <label for="fn">FN:</label>

              <input type="number" class="form-control" name="fn" min="1" max="1000000"/>

          </div>

          <div class="form-group">

              <label for="name">Student Name:</label>

              <input type="text" class="form-control" name="name"/>

          </div>

          <div class="form-group">
              <label for="score">Score:</label>
              <input type="range" name="score"  min="0" max="100" value="50" step="1" list="values"/>
          </div>

<datalist id="values">
  <option value="0" label="0"></option>
  <option value="25" label="25"></option>
  <option value="50" label="50"></option>
  <option value="75" label="75"></option>
  <option value="100" label="100"></option>
</datalist>
          <div class="form-group">

              <label for="picture">Picture :</label>

              <input type="file" class="form-control" name="picture"/>

          </div> 
		  
          <button type="submit" class="btn btn-primary">Add Student</button>

      </form>

  </div>

</div>

@endsection