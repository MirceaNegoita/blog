@extends('layouts.admin')

@section('page_title')
    Message - {{ $message->id }}
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="container-fluid">
            <div class="box">
                <div class="box-heading">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="heading-title">Message From {{ $message->email }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="box-content">
                    <h4>Subject : {{ $message->subject }}</h4>
                    <p>Message : {{ $message->message }}</p>
                </div>
            </div>
        </div>
    </div>


@endsection