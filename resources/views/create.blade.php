
@extends('partials.master')
@section('content')

 <h1> Create a Post </h1>

  <form method="POST" action="/create">
 
    {{ csrf_field() }}

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
 
  <div class="form-group">
    <label for="body">Body</label>
    <input type="text" class="form-control" id="body" name="body">
  </div>
 
  <button type="submit" class="btn btn-success">Submit</button>

  @include('partials.errors')
  
  </form>
  
@endsection