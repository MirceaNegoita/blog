<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bulma Blog - @yield('page_title')</title>
    <link rel="stylesheet" href="{{ asset('client/css/bulma.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Rock+Salt" rel="stylesheet"> 
  </head>
  <body>
    <!-- this is the top navigation -->
    <nav class="nav has-shadow">
      <div class="container">
	<div class="nav-left">
		<a class="nav-item">
      <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
	  </a>
	</div>
	<div class="nav-center">
	  <a class="nav-item is-tab">
	    <span class="icon">
              <i class="fa fa-facebook"></i>
	    </span>
	  </a>
	  <a class="nav-item is-tab">
	    <span class="icon">
              <i class="fa fa-twitter"></i>
	    </span>
	  </a>
	  <a class="nav-item is-tab">
	    <span class="icon">
              <i class="fa fa-instagram"></i>
	    </span>
	  </a>
	  <a class="nav-item is-tab">
	    <span class="icon">
              <i class="fa fa-github"></i>
	    </span>
	  </a>
	</div>
	<span class="nav-toggle">
	  <span></span>
	  <span></span>
	  <span></span>
	</span>
	
	<div class="nav-right nav-menu">
        <a class="nav-item is-tab @if(isset($current_route) && $current_route === 'home') is-active @endif" href="{{ route('home') }}">Home</a>
        <a class="nav-item is-tab @if(isset($current_route) && $current_route === 'about') is-active @endif"  href="{{ route('about') }}">About</a>
        <a class="nav-item is-tab @if(isset($current_route) && $current_route === 'contact') is-active @endif" href="{{ route('contact') }}">Contact</a> 
	</div>
      </div>
    </nav>
    <!-- end of top navigation -->

    <!-- this is the title section -- this can include a header image
	 if this section isn't big enough, add a div with the "section" class -->
    <div class="header-content">
      <section class="hero is-light">
	<div class="hero-body">
	  <div class="container has-text-centered">
	    <h1 class="title is-1 is-spaced">
              Mircea's Blog
	    </h1>
	    <h3 class="subtitle is-3">
          <i>... or something</i>
			</h3>
	  </div>
	</div>
      </section>
    </div>
    <!-- end of title section -->

    <!-- this is the main page content -->
    <div class="main-content">
      <div class="container">
	<div class="columns is-multiline is-centered">	  
	  <!-- posts (image length should be 400; height can be whatever) -->
	  <div class="column is-8">
	     @yield('content')
	  </div>
	  <!-- end of about column -->

	  <!-- sidebar with plugins/details/etc -->
	  <div class="column is-4 is-narrow">
	    <div class="card-wrapper">
	      <div class="card">
		<header class="card-header-fix-center has-text-centered">
		  <p class="card-header-title-fix">
		    Search
		  </p>
		</header>
		<div class="card-content">
		  <div class="content">
		    <form action="{{ route('search') }}" method="POST">
		    	{{ csrf_field() }}
		    		<div class="field has-addons">
					  <div class="control">
					    <input class="input" name="search" type="text" placeholder="Looking for something?">
					  </div>
					  <div class="control">
					    <a class="button is-primary">
					    	<i class="fa fa-search"></i>
					     	Search
					    </a>
					  </div>
					</div>
		    </form>
		  </div>
		</div>
	      </div>
	    </div>

	    @if(isset($widget))
	    	<div class="card-wrapper">
	      <div class="card">
		<div class="card-image">
		  <figure class="image is-4by3">
		    @if(isset($widget->media))
		    	<img src="{{ asset($widget->media->path) }}" alt="Image"> 
		    @endif
		  </figure>
		</div>
		<div class="card-content">
		  <div class="media">
		    <div class="media-left">
		      <figure class="image is-48x48">
			@if(isset($widget->author->media))
					<img src="{{ asset($widget->author->media->path) }}" alt="{{ $widget->author->name }}">
			@endif
		      </figure>
		    </div>
		    <div class="media-content">
					<p class="title is-4"><a>{{ $widget->author->name }}</a></p>
		      <p class="subtitle is-6">@mirceanegoita</p>
		    </div>
		  </div>

		  <div class="content">
		    {!! $widget->content !!}
		    {{-- <small>11:09 PM - 1 Jan 2016</small> --}}
		  </div>
		</div>
	      </div>
	    </div>
	    @else
	    	<div class="card-wrapper">
	      <div class="card">
		<div class="card-image">
		  <figure class="image is-4by3">
		    <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
		  </figure>
		</div>
		<div class="card-content">
		  <div class="media">
		    <div class="media-left">
		      <figure class="image is-48x48">
			<img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
		      </figure>
		    </div>
		    <div class="media-content">
		      <p class="title is-4">Mircea Negoita</p>
		      <p class="subtitle is-6">@mirceanegoita</p>
		    </div>
		  </div>

		  <div class="content">
		    I am a back-end web developer from Galati, Romania. When I am not coding professionally at my job I enjoy writting articles about technology, short horror stories and whatever crosses my mind <a>@mirceasblog</a>.
		    <a>#laravel</a> <a>#webdev</a>
		    {{-- <small>11:09 PM - 1 Jan 2016</small> --}}
		  </div>
		</div>
	      </div>
	    </div>
	    @endif

	    <div class="card-wrapper">
	      <div class="card">
		<header class="card-header-fix-center has-text-centered">
		  <p class="card-header-title-fix">
		    Contact Me
		  </p>
		</header>
		<div class="card-content">
		  <div class="content">
			Have a interesting project, article suggestion or just want to say hello? You can contact me at in this contact form <a href="{{ route('contact') }}">here</a>
		  </div>
		</div>
	      </div>	    
	    </div>
	    <!-- end of plugins/etc/ column -->
	    
	  </div>
	</div>
      </div>
    </div>
    <!-- end of main page content -->

    <!-- footer begins here -->
    <div class="footer footer-top-shadow">
      <div class="container has-text-centered">
	<div class="nav-center">
	  <a class="nav-item" href="http://github.com/MirceaNegoita">
	    <span class="icon">
	      <i class="fa fa-github"></i>
	    </span>
	  </a>
	</div>  
	<p>Copyright by <a href="http://github.com/MirceaNegoita">Mircea Negoita</a></p>
      </div>
    </div>
    <!-- footer end here -->    
  </body>
</html>
