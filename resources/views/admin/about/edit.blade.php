@extends('layouts.admin')

@section('page_title')
    Edit About Page
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="box">
            <div class="box-heading">
                <h4 class="heading-title">Edit About Page</h4>
            </div>
            <hr>
            <div class="box-content">
                <form action="{{ route('about.update', ['id' => $about->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $about->title }}">
                    </div>
                    <div class="form-group">
                        <label for="subtitle" class="control-label">Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" placeholder="Subtitle" value="{{ $about->subtitle }}">
                    </div>
                    <div class="form-group">
                        @if(isset($about->media))
                            <img src="{{ asset($about->media->path) }}" width="100%" height="100%" style="object-fit: contain;">
                        @endif
                        <label for="image" class="control-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label">Content</label>
                        <textarea name="content" id="" cols="30" rows="10" class="ckeditor">{{ $about->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i>Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection