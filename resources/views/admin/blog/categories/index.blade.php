@extends('layouts.admin')

@section('page_title')
    Categories
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Categories</h1>
                <a href="{{ route('category.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>Create Category</a>
            </div>
            <div class="panel-body">
                @if ($categories->count())
                    <table class="table table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><a class="btn btn-info" href="{{ route('category.edit', ['id' => $category->id]) }}"><i class="fa fa-pencil"></i>Edit</a></td>
                                    <td><a class="btn btn-danger" href="{{ route('category.delete', ['id' => $category->id]) }}"><i class="fa fa-trash"></i>Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No categories found</p>
                @endif
            </div>
        </div>
    </div>
@endsection