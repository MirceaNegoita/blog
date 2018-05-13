@extends('layouts.client')

@section('page_title')
    {{ $post->title }}
@endsection

@section('content')
<div class="box">
    <div class="has-text-centered">
  <div class="post-header">
    @if (isset($post->media))
      <img src="{{ asset($post->media->path) }}">
    @endif
    <h4 class="title is-4 is-spaced"><a>{{ $post->title }}</a></h4>
    <h5 class="subtitle is-5"><i>{{ $post->subtitle }}</i></h5>
    <hr/>
  </div>
    </div>
    <div class="content-wrapper">
    <p>{!! $post->content, 10 !!}</p>
    </div>
    <div class="end-post-details">
  <div class="is-pulled-left">
   <i>{{ $post->created_at->diffForHumans() }} by <a>{{ $post->author->name }}</a></i>
  </div>
  <div class="is-pulled-right">
    @if ($post->tags->count())
      @foreach ($post->tags as $tag)
        <a href="{{ route('home') }}?tag={{$tag->id}}">#{{ $tag->name }}</a>
      @endforeach
    @endif
  </div>
    </div>
    <hr/>
    <div class="author-content">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        @if ($post->author->media->count())
          <img src="{{ asset($post->author->media->path) }}" alt="{{ $post->author->name }}">
        @endif
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <strong>{{ $post->author->name }}</strong>
         <p>{!! $post->author->description  !!}</p>
      </div>
    </div>
  </article>
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
@endsection
