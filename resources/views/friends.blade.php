@extends('layouts.index')
@section('title')
    Friends
@endsection
@section('left-block')
    <div class="container">
        @foreach($friends as $friend)
            <div class="col-md-8">
                <a href="/id{{$friend->id_user}}">{{$friend->name.' '.$friend->surname}}</a>
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
