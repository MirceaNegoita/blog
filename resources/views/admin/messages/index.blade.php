@extends('layouts.admin')

@section('page_title')
    Messages
@endsection

@section('content')
    <div class="row" style="padding-top:40px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Messages</h1>
            </div>
            <div class="panel-body">
                @if ($messages->count())
                    <table class="table table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Show</th>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->id }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td><a class="btn btn-info" href="{{ route('messages.show', ['id' => $message->id]) }}"><i class="fa fa-eye"></i>Show</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No messages :( , forever alone</p>
                @endif
            </div>
        </div>
    </div>
@endsection