<div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="/">Home</a>         

          @if(Auth::check())
            <a class="nav-link" href="/create">Create Post</a>
            <a class="nav-link ml-auto" href="/logout"> Logout ({{ Auth::user()->name }})</a>
          @endif

          @if(Auth::guest())
            <a class="nav-link" href="/register">Sign up</a>
            <a class="nav-link" href="/login">Sign in</a>
          @endif

        </nav>
      </div>
    </div>