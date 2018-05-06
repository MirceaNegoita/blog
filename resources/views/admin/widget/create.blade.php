@extends('layouts.admin')

@section('page_title')
    Create Post
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Create Post</h1>
            </div>
            <div class="panel-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="author" class="control-label">Author</label>
                        <select name="author" class="form-control">
                            <option selected disabled>Select an author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Categories</label>
                        @foreach ($categories as $category)
                            <div class="checkbox">
                                <label>
                                    <input name="categories[]" type="checkbox" value="{{ $category->id }}">{{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        @foreach ($tags as $tag)
                            <div class="checkbox">
                                <label>
                                    <input name="tags[]" type="checkbox" value="{{ $tag->id }}">{{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
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
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection