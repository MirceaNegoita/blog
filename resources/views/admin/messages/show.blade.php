@extends('layouts.admin')

@section('page_title')
    Message - {{ $message->id }}
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>Message From {{ $message->email }}</h3>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="panel-body">
                <h4>Subject : {{ $message->subject }}</h4>
                <p>Message : {{ $message->message }}</p>
            </div>
        </div>
    </div>


@endsection