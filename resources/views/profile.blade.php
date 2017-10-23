@extends('layouts.index')
@foreach ($users as $user)
@section('title')
    {{ucfirst($user->name)}}
    {{ucfirst($user->surname)}}
@endsection
@section('left-block')
    <div class="user-col col-xs-4 col-sm-4 col-md-3">
        <div class="user-image"><img src="{{asset('img/man.jpg')}}"></div>

        <div class="user-friends">
            <div class="user-friends-title col-md-12">Friends</div>
            <div class="col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/woman.jpg')}}"></div>
            <div class="col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/man.jpg')}}"></div>
            <div class="col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/woman.jpg')}}"></div>
            <div class="col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/man.jpg')}}"></div>
            <div class="col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/woman.jpg')}}"></div>
            <div class="col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/man.jpg')}}"></div>
        </div>

        <div class="user-events">
            <div class="user-events-title col-xs-12 col-sm-12 col-md-12">Events</div>
            <div class="user-event-img col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/event1.jpg')}}"></div>
            <div class="user-event-name col-xs-8 col-sm-8 col-md-8">Meeting in the center</div>
            <div class="user-event-descr col-xs-8 col-sm-8 col-md-8">55th to 110th Street</div>
            <div class="user-event-img col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/event2.jpg')}}"></div>
            <div class="user-event-name col-xs-8 col-sm-8 col-md-8">Volleyball</div>
            <div class="user-event-descr col-xs-8 col-sm-8 col-md-8">55th to 110th Street</div>
        </div>

    </div>
@endsection
@section('right-block')
    <div class="user-info-col col-xs-8 col-sm-8 col-md-9">
        <div class="user-fullname">
            {{ucfirst($user->name)}}
            {{ucfirst($user->surname)}}
        </div>
        <div class="top-line"></div>
        <div class="user-about">
            {{$user->email}}<br>
            {{$user->birth_date}}<br>
        </div>
    </div>
    @endforeach
@endsection

