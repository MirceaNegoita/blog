@extends('layouts.client')

@section('page_title')
    Home
@endsection

@section('content')
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
        <div class="post-wrapper">
            <div class="box">
          <div class="post-header has-text-centered">
            @if (isset($post->media))
              <a href="{{ route('post', ['id' => $post->id, 'slug' => $post->title]) }}">
                <img src="{{ asset($post->media->path) }}">
              </a>
            @endif
            <h4 class="title is-4"><a href="{{ route('post', ['id' => $post->id, 'slug' => $post->title]) }}">{{ $post->title }}</a></h4>
          </div>
          <hr/>
          <div class="post-content-short">
            <p>{!! truncate($post->content, 500) !!}</p>
            <div class="continue-reading has-text-centered">
              <a href="{{ route('post', ['id' => $post->id, 'slug' => $post->title]) }}" class="button is-primary is-outlined">Continue Reading</a>
            </div>
            <div class="post-content-details">
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
          </div>
            </div>
          </div>

          @if ($posts->count())
              <div class="section">
                <nav class="pagination is-medium is-centered">
                  <ul class="pagination-links">
                      {{-- {!! $posts->links !!} --}}
                  </ul>
                </nav>
              </div>
          @endif
        @endforeach
    @else
          <div class="post-wrapper">
              <div class="box">
                 <div class="post-header has-text-centered">
                    <h4 class="title is-4">Well this is awkward </h4>
                  </div>
                  <hr/>
                  <div class="post-content-short">
                    <p style="text-align:center">No posts found! :(</p>
                  </div>
              </div>
          </div>
    @endif
@endsection
