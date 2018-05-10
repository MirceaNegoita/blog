@extends('layouts.admin')

@section('page_title')
    Posts
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="col-sm-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3>All Posts</h3>
                    
                    <a class="btn btn-success" href="{{ route('post.create') }}"><i class="fa fa-plus"></i>New Post</a>
                    
                </div>

                <div class="panel-body">
                    @if ($posts->count())
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Categories</th>
                                <th>Tags</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            @if (isset($post->status))
                                                {{ $post->status->label }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($post->categories->count())
                                                @foreach ($post->categories as $category)
                                                    {{ $category->name }}
                                                @endforeach
                                            @else
                                                No cateogires set
                                            @endif
                                        </td>
                                        <td>
                                            @if ($post->tags->count())
                                                @foreach ($post->tags as $tag)
                                                    {{ $tag->name }}
                                                @endforeach
                                            @else
                                                No tags set
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($post->media))
                                                <img src="{{ asset($post->media->path) }}" style="object-fit:contain">
                                            @else
                                                Media not set
                                            @endif
                                        </td>
                                        <td><a class="btn btn-info" href="{{ route('post.edit', ['id' => $post->id, 'slug' => $post->title]) }}"><i class="fa fa-pencil"></i>Show</a></td>
                                        <td><a class="btn btn-danger" href="{{ route('post.delete', ['id' => $post->id]) }}"><i class="fa fa-trash"></i>Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No posts found</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection