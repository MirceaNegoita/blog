@extends('layouts.admin')

@section('page_title')
    Tags
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Tags</h1>
                <a href="{{ route('tag.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>Create Tag</a>
            </div>
            <div class="panel-body">
                @if ($tags->count())
                    <table class="table table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delte</th>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td><a class="btn btn-info" href="{{ route('tag.edit', ['id' => $tag->id]) }}"><i class="fa fa-pencil"></i>Edit</a></td>
                                    <td><a class="btn btn-danger" href="{{ route('tag.delete', ['id' => $tag->id]) }}"><i class="fa fa-trash"></i>Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No tags found</p>
                @endif
            </div>
        </div>
    </div>
@endsection