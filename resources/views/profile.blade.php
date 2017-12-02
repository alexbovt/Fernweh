@extends('layouts.index')
@section('title')
    {{ucfirst($user->name)}}
    {{ucfirst($user->surname)}}
@endsection
@section('left-block')
    <div class="container">
        <div class="user-col col-xs-12 col-sm-4 col-md-3">
            <div class="user-image"><img src="{{asset("/img/man.jpg")}}"></div>
            @if(is_null($statusFriend))
                <a href="" class="btn btn-info col-md-12 col-sm-12 col-xs-12">Update profile photo</a>
            @elseif($statusFriend === true)
                <a id="delete-event" class="btn btn-danger delete-from-friends">Delete from friend</a>
                <div id="delete-event-form">
                    <span id="delete-event-form-close">X</span>
                    <div class="delete-event-form-title">Are you sure you want to
                        delete {{$user->name.' '.$user->surname}} from friends?
                    </div>
                    <input type="reset" class="btn join-event" id="delete-event-resignation" value="No">
                    <a href="/id{{$user->id_user}}/deleteFriend" class="btn  delete-event">Yes</a>
                </div>
                <div id="overlay"></div>
                <a id="elem" href="" class="btn btn-info col-md-12 col-sm-12 col-xs-12">Send message</a>
                <div id="new-event-form">
                    <span id="new-event-form-close">X</span>
                    <div class="new-event-form-title">Message
                        to <a href="/id{{$user->id_user}}">{{$user->name.' '.$user->surname}}</a></div>
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
            @elseif($statusFriend === false)
                <a href="/id{{$user->id_user}}/sendRequest" class="btn btn-info col-md-12 col-sm-12 col-xs-12">Add
                    to
                    friends</a>
                <a id="elem" href="" class="btn btn-info col-md-12 col-sm-12 col-xs-12">Send message</a>
                <div id="new-event-form">
                    <span id="new-event-form-close">X</span>
                    <div class="new-event-form-title">Message
                        to <a href="/id{{$user->id_user}}">{{$user->name.' '.$user->surname}}</a></div>
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
            @endif
            <div class="user-friends col-xs-12 col-sm-12 col-md-12">
                <a href="/friends">
                    <div class="user-friends-title col-xs-12 col-sm-12 col-md-12">Friends ({{count($friends)}})
                    </div>
                </a>
                @foreach($friends as $friend)
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <a href="/id{{$friend->id_user}}" class="col-md-12"><img src="{{asset('img/man2.jpg')}}"
                                                                                 class="img-circle"></a>
                        <a href="/id{{$friend->id_user}}" class="col-md-12">{{$friend->name}}</a>
                    </div>
                @endforeach
            </div>
            <div class="user-events col-xs-12 col-sm-12 col-md-12">
                <a href="/events">
                    <div class="user-events-title col-xs-12 col-sm-12 col-md-12">Events ({{count($events)}})</div>
                </a>
                @foreach($events as $event)

                    <a href="/event_id{{$event->id_event}}">
                        <div class=" us-ev col-xs-12 col-sm-12 col-md-12">
                            <div class="user-event-img col-xs-4 col-sm-4 col-md-5"><img
                                        src="{{asset('img/event1.jpg')}}">
                            </div>
                            <div class="user-event-name col-xs-8 col-sm-8 col-md-6">{{$event->event_name}}</div>
                            <div class="user-event-descr col-xs-8 col-sm-8 col-md-6">{{$event->id_address_event}}</div>
                        </div>
                    </a>
                @endforeach
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
                    <div class="user-info-info col-md-8">{{ucfirst($address->country)}},{{ucfirst($address->city)}}
                        ,{{ucfirst($address->street)}}</div>
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
    </div>
@endsection