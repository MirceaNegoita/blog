@extends('layouts.admin')

@section('page_title')
    Edit Post-{{ $post->title }}
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="container-fluid">
            <div class="box">
                <div class="box-heading">
                    <h4 class="heading-title">Edit Post : {{ $post->title }}</h4>
                </div>
                <hr>
                <div class="box-content">
                    <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="control-label">Subtitle</label>
                            <input type="text" class="form-control" name="subtitle" placeholder="Subtitle" value="{{ $post->subtitle }}">
                        </div>
                        <div class="form-group">
                            <label for="slug" class="control-label">Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Slug" value="{{ $post->slug }}">
                        </div>
                        <div class="form-group">
                            <label for="author" class="control-label">Author</label>
                            <select name="author" class="form-control">
                                <option value="{{ $post->author->id }}">{{ $post->author->name }}</option>
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
                                        <input name="categories[]" type="checkbox" value="{{ $category->id }}" @if(isset($post->categories) && in_array($category->id, $post->categories->pluck('id')->toArray()) )) checked @endif>{{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            @foreach ($tags as $tag)
                                <div class="checkbox">
                                    <label>
                                        <input name="tags[]" type="checkbox" value="{{ $tag->id }}" @if( in_array($tag->id, $post->tags->pluck('id')->toArray()) ) checked @endif>{{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            @if(isset($post->media))
                                <img src="{{ asset($post->media->path) }}" alt="{{ $post->title }}" width="100%" height="100%" style="object-fit: contain;">
                            @endif
                            <label for="image" class="control-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label">Content</label>
                            <textarea name="content" id="" cols="30" rows="10" class="ckeditor">{{ $post->content }}</textarea>
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


