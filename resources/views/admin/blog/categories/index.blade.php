@extends('layouts.admin')

@section('page_title')
    Categories
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="box">
            <div class="box-heading">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h4>Categories</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('category.create') }}" id="create-button" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Create Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="box-content">
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