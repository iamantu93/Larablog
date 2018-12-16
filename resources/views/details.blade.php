@extends('partials.master')

@section('content')
      <h2 class="blog-post-title">{{ $post->title }}</h2>

      @if(count($post->tags))
      <ul>
        @foreach($post->tags as $tag)
          <li>
            <a href="/posts/tags/{{ $tag->name }}">
            {{ $tag->name }}
            </a>
          </li>
        @endforeach
      </ul>
      @endif

      <p class="blog-post-meta">
      <p>{{ $post->user->name }} on
      {{ $post->created_at->toFormattedDateString() }}</p>
      <p>{{ $post->body }}</p> 
     <hr>
     <div class="comments">
           <ul class="list-group">
           @foreach($post->comments as $comment)
             <li class="list-group-item">
             <h2>{{ $comment->user->name }}</h2>
             <strong>              
              {{ $comment->created_at->diffForHumans() }}: &nbsp;              
             </strong>               
               {{ $comment->body }}
             </li>
             @endforeach           
           </ul>
     </div>
     <hr>
    @if(auth()->check())
     <div class="card">
       <div class="card-block">
         <form action="/posts/{{ $post->id }}/comments" method="POST">
          {{ csrf_field() }}
           <div class="form-group">
           <textarea name="body" placeholder="Enter your comment"  cols="10" rows="10" class="form-control"></textarea>
           </div>
            <div class="form-group">
             <button type="submit" class="btn btn-success">Submit</button>
            </div>
         </form>
       </div>
     </div>
     @include('partials.errors')
    @endif
@endsection