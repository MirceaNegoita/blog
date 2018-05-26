@extends('layouts.admin')

@section('page_title')
    About Page
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="col-sm-12">
            <div class="box">
                <div class="panel-heading">
                    <h4>All Posts</h4>
                    @if(!$abouts->count())
                        <a class="btn btn-success" href="{{ route('about.create') }}"><i class="fa fa-plus"></i>New Page</a>    
                    @endif    
                </div>
                <hr>
                <div class="box-content">
                    @if ($abouts->count())
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)
                                    <tr>
                                        <td>{{ $about->id }}</td>
                                        <td>{{ $about->title }}</td>
                                        <td><a class="btn btn-info" href="{{ route('about.edit', ['id' => $about->id]) }}"><i class="fa fa-pencil"></i>Show</a></td>
                                        <td><a class="btn btn-danger" href="{{ route('about.delete', ['id' => $about->id]) }}"><i class="fa fa-trash"></i>Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Page is not set</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection