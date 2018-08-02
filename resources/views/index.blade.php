@extends('partials.master')
@section('content')  
@foreach($posts as $post)
    <div class="blog-post">
    <a href="/posts/{{ $post->id}}"> <h1 style="color:blue">{{ $post->title }}</h2> </a>
      <p class="blog-post-meta">
      {{ $post->user->name }} on
      {{ $post->created_at->toFormattedDateString() }}
      </p>
     <p>{{ $post->body }}</p> 
    </div><!-- /.blog-post -->
    @endforeach
@endsection