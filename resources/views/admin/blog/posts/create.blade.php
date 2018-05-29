@extends('layouts.admin')

@section('page_title')
    Create Widget
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="container-fluid">
            <div class="box">
                <div class="box-heading">
                    <h4 class="heading-title">Create Post</h4>
                </div>
                <hr>
                <div class="box-content">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="author" class="control-label">Author</label>
                            <select name="author" class="form-control">
                                <option selected disabled>Select an author</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
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
                            <label for="status" class="control-label">Status</label>
                            <select name="status" class="form-control">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection