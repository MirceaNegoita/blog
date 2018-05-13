@extends('layouts.admin')

@section('page_title')
    Edit Profile-{{ $user->name }}
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Edit Profile : {{ $user->name }}</h1>
            </div>
            <div class="panel-body">
                <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <textarea name="description" name="description" cols="30" rows="10" class="form-control">{{ $user->description }}</textarea>
                    </div>
                    <div class="form-group">
                        @if(isset($user->media))
                            <img src="{{ asset($user->media->path) }}" alt="{{ $user->name }}" width="100%" height="100%" style="object-fit: contain;">
                        @endif
                        <label for="image" class="control-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i>Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection


