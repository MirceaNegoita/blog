@extends('layouts.client')

@section('page_title')
    Contact
@endsection

@section('content')
<div class="box">
    <div class="content-header">
  <div class="has-text-centered">
    <img src="http://placehold.it/200x200">
    <h4 class="title is-4 is-spaced">Contact</h4>
    <h5 class="subtitle is-5"><i>Come and say hello</i></h5>

    <!-- some short links like on above -->
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
    </div>
    <!-- end short links -->
    
    <hr/>
  </div>
    </div>

    <!-- form begin -->
  <form action="{{ route('contact.post') }}" method="POST">
    {{ csrf_field() }}
  <div class="field">
    <label class="label">Name</label>
    <p class="control">
      <input class="input" type="text" placeholder="Name" name="name">
    </p>
    @if ($errors->has('name'))
        <span>
        <strong style="color:red !important;">{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>

  <div class="field">
    <label class="label">Email</label>
    <p class="control">
      <input class="input" type="text" placeholder="Email" name="email">
    </p>
    @if ($errors->has('email'))
      <span style="color:red">
        <strong style="color:red !important;">{{ $errors->first('email') }}</strong>
      </span>
    @endif
  </div>

  <div class="field">
    <label class="label">Subject</label>
    <p class="control">
      <input class="input" type="text" placeholder="Subject" name="subject">
    </p>
    @if ($errors->has('subject'))
      <span style="color:red">
        <strong style="color:red !important;">{{ $errors->first('subject') }}</strong>
      </span>
    @endif
  </div>

  <div class="field">
    <label class="label">Message</label>
    <p class="control">
      <textarea class="textarea" placeholder="Message" name="message"></textarea>
    </p>
    @if ($errors->has('message'))
      <span style="color:red">
        <strong style="color:red !important;">{{ $errors->first('message') }}</strong>
      </span>
    @endif
  </div>

  <div class="field is-grouped">
    <p class="control">
      <button type="submit" class="button is-primary">Send</button>
    </p>
    <p class="control">
      <button class="button is-link">Clear</button>
    </p>
  </div>
    </form>
    <!-- form end -->
    
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
