@extends('layouts.admin')

@section('page_title')
    Edit Tag 
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="box">
            <div class="box-heading">
                <h1>Edit Tag-{{ $tag->id }}</h1>
            </div>
            <hr>
            <div class="box-content">
                <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="{{ $tag->name }}">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection