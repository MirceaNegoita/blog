@extends('layouts.admin')

@section('page_title')
    Edit Category-{{ $category->id }}
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="box">
            <div class="box-heading">
                <h4 class="heading-title">Edit Category-{{ $category->id }}</h4>
            </div>
            <hr>
            <div class="box-content">
                <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="{{ $category->name }}">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i>Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection