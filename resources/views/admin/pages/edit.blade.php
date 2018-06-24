@extends('layouts.admin')

@section('page_title')
    Edit Page
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="box">
            <div class="box-heading">
                <h4 class="heading-title">Edit Page</h4>
            </div>
            <hr>
            <div class="box-content">
                <form action="{{ route('pages.update', ['id' => $page->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $page->title }}">
                    </div>
                    <div class="form-group">
                        <label for="subtitle" class="control-label">Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" placeholder="Subtitle" value="{{ $page->subtitle }}">
                    </div>
                    <div class="form-group">
                        @if(isset($page->media))
                            <img src="{{ asset($page->media->path) }}" width="100%" height="100%" style="object-fit: contain;">
                        @endif
                        <label for="image" class="control-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label">Content</label>
                        <textarea name="content" id="" cols="30" rows="10" class="ckeditor">{{ $page->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="control-label">Slug</label>
                        <input type="text" name="slug" class="form-control" value="$page->slug">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i>Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection