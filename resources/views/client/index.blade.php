@extends('layouts.client')

@section('page_title')
    Home
@endsection

@section('content')
    @if ($posts->count())
        @foreach ($posts as $post)
        <div class="post-wrapper">
            <div class="box">
          <div class="post-header has-text-centered">
            <img src="http://placehold.it/900x600">
            <h4 class="title is-4"><a href="#">Some Post</a></h4>
          </div>
          <hr/>
          <div class="post-content-short">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales pulvinar laoreet. Quisque consequat justo velit, at aliquam ex aliquet eu. Nulla facilisi. Vivamus ac nibh congue, faucibus purus sit amet, malesuada est. Mauris fringilla vulputate libero, et interdum purus sollicitudin vel.</p>
            <div class="continue-reading has-text-centered">
              <a class="button is-primary is-outlined">Continue Reading</a>
            </div>
            <div class="post-content-details">
              <div class="is-pulled-left">
                <i>November 28, 2017 by <a>Author</a></i>
              </div>
              <div class="is-pulled-right">
                <a>#blog</a> <a>#me</a> <a>#fun</a>
              </div>
            </div>
          </div>
            </div>
          </div>
        @endforeach
    @endif
@endsection
