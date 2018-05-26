@extends('layouts.admin')

@section('page_title')
    Create Tag
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="box">
            <div class="box-heading">
                <h4 class="heading-title">Create Tag</h4>
            </div>
            <hr>
            <div class="box-content">
                <form action="{{ route('tag.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-success"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection