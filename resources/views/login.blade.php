@extends('partials.master')

@section('content')

<h1> Sign in</h1>
<form method="POST" action="/login">

  {{ csrf_field() }}

<div class="form-group">
  <label for="email">Email</label>
  <input type="text" class="form-control" id="email" name="email">
</div>

<div class="form-group">
  <label for="password">Password</label>
  <input type="password" class="form-control" id="password" name="password">
</div>

<button type="submit" class="btn btn-success">Sign in</button>
<hr>

@include('partials.errors')

</form>

@endsection