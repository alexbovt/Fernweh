@extends('layouts.index')
@section('title')
    Friends
@endsection
@section('left-block')
    <div class="container">
        <div class="friends-left-col col-xs-12 col-sm-12 col-md-8">
            <div class="friends-title col-xs-12 col-sm-12 col-md-12">Friends ({{count($friends)}})</div>
            @foreach($friends as $friend)
                <div class="friends col-xs-12 col-sm-12 col-md-12">
                    <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <div class="friends-list">
                        <ul>
                            <li><a href="/id{{$friend->id_user}}">{{$friend->name.' '.$friend->surname}}</a></li>
                            <li><a id="elem" href="">Write a message</a></li>
                            <div id="new-event-form">
                                <span id="new-event-form-close">X</span>
                                <div class="new-event-form-title">Message
                                    to <a href="/id{{$friend->id_user}}">{{$friend->name.' '.$friend->surname}}</a> </div>
                                <form method="POST">
                                    <div class="message-text">
                                    <textarea></textarea></div>
                                    <button type="submit"
                                            class="btn btn-primary create-btn">
                                        Send
                                    </button>
                                </form>
                            </div>
                            <div id="overlay"></div>
                        </ul>
                    </div>
                    <a href="">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </div>

            @endforeach
        </div>
        @endsection


        @section('right-block')
            <div class="friends-right-col col-xs-12 col-sm-12 col-md-3">
                <div class="friends-right-href" style="background: #f9b9a2;"><a href="/friends">My friends</a></div>
                <div class="friends-right-href"><a href="/requests">Friends requests</a></div>
            </div>

@endsection
