@extends('layouts.admin')

@section('page_title')
    Create Category
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Create Category</h1>
            </div>
            <div class="panel-body">
                <form action="{{ route('category.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-success"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection