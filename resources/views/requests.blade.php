@extends('layouts.index')
@section('title')
    Friends
@endsection
@section('left-block')
    <div class="container">
        @foreach($friend_requests as $friend_request)
            <div class="col-md-8">
                <a href="/id{{$friend_request->id_user}}">{{$friend_request->name.' '.$friend_request->surname}}</a>
            </div>
        @endforeach
        @endsection
        @section('right-block')
            <div class="col-md-4">
                <a href="/friends">friends</a>
                <a href="/requests">requests</a>
            </div>
    </div>
@endsection
