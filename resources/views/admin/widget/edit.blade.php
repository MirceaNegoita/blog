@extends('layouts.admin')

@section('page_title')
    Edit Widget
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Edit Widget</h1>
            </div>
            <div class="panel-body">
                <form action="{{ route('widget.update', ['id' => $widget->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="author" class="control-label">Author</label>
                        <select name="author" class="form-control">
                        <option value="{{ $widget->author->id }}" selected>{{ $widget->author->name }}</option>
                            @if($authors->count())
                                @foreach ($authors as $author)
                                    @if($author->name != $widget->author->name)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        @if(isset($widget->media))
                            <img src="{{ asset($widget->media->path) }}" height="100%" width="100%" style="object-fit: contain;"> 
                        @endif
                        <label for="image" class="control-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label">Content</label>
                        <textarea name="content" id="" cols="30" rows="10" class="ckeditor">{{ $widget->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i>Update</button>
                        <a href="{{ route('widget.destroy', ['id' => $widget->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection