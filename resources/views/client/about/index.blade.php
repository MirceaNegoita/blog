@extends('layouts.client')

@section('page_title')
    About
@endsection

@section('content')
  
    @if (isset($about))
    <div class="box">
      <div class="content-header">
    <div class="has-text-centered">
      @if(isset($about->media))
        <img src="{{ asset($about->media->path) }}" alt="{{ $about->title }}">
      @else
        <img src="http://placehold.it/200x200">
      @endif
      <h4 class="title is-4 is-spaced">{{ $about->title }}</h4>
      <h5 class="subtitle is-5"><i>{{ $about->subtitle }}</i></h5>
      <hr/>
    </div>
      </div>
      <div class="content-wrapper">
      <p>
        {!! $about->content !!}
      </p>
      <hr>
      <p>I hope you do enjoy my articles and if you have any feedback or suggestions, you can leave them <a href="{{ route('contact') }}">here</a>.</p>
      </div>
      <hr/>
      <div class="end-content-nav-wrapper">
    <div class="is-pulled-left">
    <a href="{{ route('home') }}">
        <i class="fa fa-angle-double-left" aria-hidden="true"> Back to Home</i>
      </a>
    </div>
      </div>
    </div>
    @else
    <div class="box">
      <div class="content-header">
    <div class="has-text-centered">
        <img src="http://placehold.it/200x200">
      <h4 class="title is-4 is-spaced">Bummer</h4>
      <h5 class="subtitle is-5"><i>The page is not set :/</i></h5>
      <hr/>
    </div>
      </div>
      <div class="content-wrapper">
      <p>
        Sorry for that!
      </p>
      <hr>
      <p>I hope you do enjoy my articles and if you have any feedback or suggestions, you can leave them <a href="{{ route('contact') }}">here</a>.</p>
      </div>
      <hr/>
      <div class="end-content-nav-wrapper">
    <div class="is-pulled-left">
    <a href="{{ route('home') }}">
        <i class="fa fa-angle-double-left" aria-hidden="true"> Back to Home</i>
      </a>
    </div>
      </div>
    </div>
    @endif
    <!-- about content should end here --> 
@endsection
