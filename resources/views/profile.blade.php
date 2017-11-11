@extends('layouts.index')
@section('title')
    {{ucfirst($user->name)}}
    {{ucfirst($user->surname)}}
@endsection
@section('left-block')
    <div class="container">
        <div class="user-col col-xs-12 col-sm-4 col-md-3">
            <div class="user-image"><img src="{{asset('img/man.jpg')}}"></div>
            <div class="user-friends col-xs-12 col-sm-12 col-md-12">
                <div class="user-friends-title col-xs-12 col-sm-12 col-md-12">Friends</div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                <a href="" class="col-md-12"><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <a href="" class="col-md-12">Name</a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <a href="" class="col-md-12"><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <a href="" class="col-md-12">Name</a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <a href="" class="col-md-12"><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <a href="" class="col-md-12">Name</a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <a href="" class="col-md-12"><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <a href="" class="col-md-12">Name</a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <a href="" class="col-md-12"><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <a href="" class="col-md-12">Name</a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <a href="" class="col-md-12"><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <a href="" class="col-md-12">Name</a>
                </div>
            </div>
            <div class="user-events col-xs-12 col-sm-12 col-md-12">
                <div class="user-events-title col-xs-12 col-sm-12 col-md-12">Events</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="user-event-img col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/event1.jpg')}}"></div>
                    <div class="user-event-name col-xs-8 col-sm-8 col-md-8">Meeting in the center</div>
                    <div class="user-event-descr col-xs-8 col-sm-8 col-md-8">55th to 110th Street</div>
                </div>
                <div class="top-line col-xs-12 col-sm-12 col-md-12"></div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="user-event-img col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/event2.jpg')}}"></div>
                    <div class="user-event-name col-xs-8 col-sm-8 col-md-8">Volleyball</div>
                    <div class="user-event-descr col-xs-8 col-sm-8 col-md-8">55th to 110th Street</div>
                </div>
                <div class="top-line col-xs-12 col-sm-12 col-md-12"></div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="user-event-img col-xs-4 col-sm-4 col-md-4"><img src="{{asset('img/event1.jpg')}}"></div>
                    <div class="user-event-name col-xs-8 col-sm-8 col-md-8">Meeting in the center</div>
                    <div class="user-event-descr col-xs-8 col-sm-8 col-md-8">55th to 110th Street</div>
                </div>
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
                <div class="user-info col-md-12">
                    <div class="user-info-title col-md-2">Date of birth</div>
                    <div class="user-info-info col-md-8">
                        {{$user->birth_date}}
                        (age: {{ (int)date('Y') - (int)substr($user->birth_date,0,4)}})
                    </div>
                </div>
                <div class="user-info col-md-12">
                    <div class="user-info-title col-md-2">Address</div>
                    <div class="user-info-info col-md-8">{{ucfirst($address->country)}},{{ucfirst($address->city)}},{{ucfirst($address->street)}}</div>
                </div>

                @if($user->languages)
                <div class="user-info col-md-12">
                    <div class="user-info-title col-md-2">Languages</div>
                    <div class="user-info-info col-md-8">{{ucfirst($user->languages)}}</div>
                </div>
                @endif
                @if($user->education)
                <div class="user-info col-md-12">
                    <div class="user-info-title col-md-2">Education</div>
                    <div class="user-info-info col-md-8">{{ucfirst($user->education)}}</div>
                </div>
                @endif
                @if($user->job)
                <div class="user-info col-md-12">
                    <div class="user-info-title col-md-2">Job</div>
                    <div class="user-info-info col-md-8">{{ucfirst($user->job)}}</div>
                </div>
                @endif
                @if($user->countries)
                <div class="user-info col-md-12">
                    <div class="user-info-title col-md-2">Countries</div>
                    <div class="user-info-info col-md-8">{{ucfirst($user->countries)}}</div>
                </div>
                @endif
                @if($user->notes)
                <div class="user-info col-md-12">
                    <div class="user-info-title col-md-2">About me</div>
                    <div class="user-info-info col-md-8">{{ucfirst($user->notes)}}</div>
                </div>
                @endif
            </div>
@endsection