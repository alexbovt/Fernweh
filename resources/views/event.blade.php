@extends('layouts.index')
@section('title')
    {{$event->event_name}}
@endsection
@section('left-block')
    <div class="container">
        <div class="event-info-col col-xs-12 col-sm-12 col-md-12">
            <div class="event-img"><img src="{{asset('img/event1.jpg')}}"></div>
            <div class="event-name">{{$event->event_name}}</div>
            @if(session()->get("attendance") === 'false')
                <a href="/event_id{{$event->id_event}}/join" class="btn join-event">Join</a>
            @elseif(session()->get("attendance") === 'true')
                <a href="/event_id{{$event->id_event}}/leave" class="btn join-event">Leave</a>
            @else
                <a href="/event_id{{$event->id_event}}/edit" class="btn join-event">Edit</a>
            @endif
            @if(session()->get("creator") === 'true')
                <a href="/event_id{{$event->id_event}}/delete" class="btn delete-event">Delete</a>
            @endif
            <div class="event-date">
                <span class="glyphicon glyphicon-time"></span>
                <div>
                    {{$event->created_at->format('M').'  '.$event->created_at->format('d').', '.$event->created_at->format('Y').', '.$event->created_at->format('h:m a')}}
                </div>
            </div>
            <div class="event-place">
                <span class="glyphicon glyphicon-map-marker"></span>
                <div>
                    {{$address->street.' '.$address->house.', '}}
                    <a href="/events/{{$address->city}}">
                        {{$address->city.','.$address->country}}
                    </a>
                </div>
            </div>
        </div>
        <div class="event-description-col col-xs-12 col-sm-8 col-md-8">
            <div class="event-description col-xs-12 col-sm-12 col-md-12">
                <div class=" col-xs-12 col-sm-12 col-md-12">
                    {{$event->notes}}
                </div>
            </div>
        </div>
        @endsection
        @section('right-block')
            <div class="event-people-list-col col-xs-12 col-sm-4 col-md-3">Going {{count($event_people_list)}}
                <div class="event-people-list col-xs-12 col-sm-12 col-md-12">
                    @foreach($event_people_list as $event_people)
                        <div>
                            <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                            <div class="event-people-info">
                                <ul>
                                    <li><a href="" style="">{{$event_people->name}}</a></li>
                                    <li>
                                        <div>{{$event_people->city}},{{$event_people->country}}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
@endsection