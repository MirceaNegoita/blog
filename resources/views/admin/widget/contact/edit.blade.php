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
                <form action="{{ route('contact.widget.update', ['id' => $contact_widget->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" name="form-control" name="title" value="{{ $contact_widget->title }}">
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label">Content</label>
                        <textarea name="content" id="" cols="30" rows="10" class="ckeditor">{{ $contact_widget->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i>Update</button>
                        <a href="{{ route('contact.widget.destroy', ['id' => $contact_widget->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection