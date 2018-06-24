@extends('layouts.admin')

@section('page_title')
    Create New Page
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="box">
            <div class="box-heading">
                <h4 class="heading-title">Create Page</h4>
            </div>
            <hr>
            <div class="box-content">
                <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="subtitle" class="control-label">Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" placeholder="Subtitle">
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label">Content</label>
                        <textarea name="content" id="" cols="30" rows="10" class="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="control-label">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection