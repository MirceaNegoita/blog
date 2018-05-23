@extends('layouts.admin')

@section('page_title')
    Create Widget
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Create Widget</h1>
            </div>
            <div class="panel-body">
                <form action="{{ route('widget.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="author" class="control-label">Author</label>
                        <select name="author" class="form-control">
                            @if($authors->count())
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            @endif
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
                        <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i>Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection