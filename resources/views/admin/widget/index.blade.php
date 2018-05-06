@extends('layouts.admin')

@section('page_title')
    Posts
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="col-sm-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3>Widget</h3>
                    
                    @if($widgets->count() < 1) 
                        <a class="btn btn-success" href="{{ route('post.create') }}"><i class="fa fa-plus"></i>Add Widget</a>
                    @endif
                    
                </div>

                <div class="panel-body">
                    @if ($widgets->count())
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($widgets as $widget)
                                    <tr>
                                        <td>{{ $widget->id }}</td>
                                        <td>{{ $widget->title }}</td>
                                        <td><a class="btn btn-info" href="{{ route('widget.edit', ['id' => $widget->id]) }}"><i class="fa fa-pencil"></i>Edit</a></td>
                                        <td><a class="btn btn-danger" href="{{ route('widget.destroy', ['id' => $widget->id]) }}"><i class="fa fa-trash"></i>Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Widget not set</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection