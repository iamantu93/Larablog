
@extends('partials.master')
@section('content')

 <h1> Edit Post </h1>

  <form method="POST" action="/posts/{{ $post->id }}/update">
  
    {{ csrf_field() }}

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
  </div>
 
  <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" placeholder="Enter your comment"  cols="10" rows="10" class="form-control"> {{ $post->body }} </textarea>
  </div>
 
  <button type="submit" class="btn btn-success">Edit Post</button>

  @include('partials.errors')
  
  </form>
  
@endsection