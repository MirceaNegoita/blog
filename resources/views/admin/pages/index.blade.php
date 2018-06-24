@extends('layouts.admin')

@section('page_title')
    Pages
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="col-sm-12">
            <div class="box">
                <div class="panel-heading">
                    <h4>All pages</h4>
                    <a class="btn btn-success" href="{{ route('pages.create') }}"><i class="fa fa-plus"></i>New Page</a>    
                </div>
                <hr>
                <div class="box-content">
                    @if ($pages->count())
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{ $page->id }}</td>
                                        <td>{{ $page->title }}</td>
                                        <td><a class="btn btn-info" href="{{ route('pages.edit', ['id' => $pages->id]) }}"><i class="fa fa-pencil"></i>Show</a></td>
                                        <td><a class="btn btn-danger" href="{{ route('pages.delete', ['id' => $pages->id]) }}"><i class="fa fa-trash"></i>Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No pages found</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection