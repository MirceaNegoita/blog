@extends('layouts.admin')

@section('page_title')
    Create Widget
@endsection

@section('content')

    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Create Post</h1>
            </div>
            <div class="panel-body">
                <form action="{{ route('contact.widget.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label">Content</label>
                        <textarea name="content" id="" cols="30" rows="10" class="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection