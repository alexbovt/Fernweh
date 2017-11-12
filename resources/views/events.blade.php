@extends('layouts.index')
@section('title')
    Events
@endsection
@section('left-block')
    <div class="container">
        <div class="event-info-col col-xs-8 col-sm-8 col-md-7">
            <div class="event col-xs-10 col-sm-10 col-md-11">Events in {{$address->city}}</div>
            <a id="elem"><span class="add-event glyphicon glyphicon-plus-sign col-xs-2 col-sm-2 col-md-1"></span></a>
            <div id="new-event-form">
                <span id="new-event-form-close">X</span>
                <div  id="test"  class="event">Creating new event</div>
                <form method="POST">
                    <div class="form-group">
                        <label for="eventType">Event type</label>
                        <input id="meeting" type="radio" name="eventType" value="meeting" checked>Meeting
                        <input id="travel" type="radio" name="eventType" value="travel">Travel
                    </div>
                    <div class="form-group">
                        <label for="eventTitle">Title</label>
                        <input type="text" id="eventTitle" name="eventTitle" class="form-control"
                               placeholder="Event title">
                    </div>
                    <div class="form-group">
                        <label for="eventPhoto">Photo</label>
                        <input type="text" id="eventPhoto" name="eventPhoto"
                               placeholder="">
                    </div>
                </form>
            </div>
            <div id="overlay"></div>
            @if(session('events_status'))
                <div class="events col-xs-12 col-sm-12 col-md-12 alert alert-warning">
                    {{ session('events_status')  }}
                </div>
            @else
                @foreach($events as $event)
                    <div class="events col-xs-12 col-sm-12 col-md-12">
                        <div class="top-line"></div>
                        <a href="/event_id{{$event->id_event}}">
                            <div class="event-img col-xs-4 col-sm-4 col-md-5"><img src="{{asset('img/event1.jpg')}}">
                            </div>
                        </a>
                        <a href="/event_id{{$event->id_event}}">
                            <div class="event-name col-xs-8 col-sm-8 col-md-7">{{$event->event_name}}</div>
                        </a>
                        <div class="col-xs-8 col-sm-8 col-md-7">{{$event->street.' '.$event->house.' | '}}
                            <a href="/events/{{$event->city}}">
                                {{$event->city.','.$event->country}}
                            </a>
                        </div>
                        <a href="">
                            <div class="col-xs-8 col-sm-8 col-md-7">5 attending</div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        @endsection
        @section('right-block')
            <div class="container">
                <div class="user-event-info-col col-xs-12 col-sm-4 col-md-3">
                    <div class="user-events-title col-xs-12 col-sm-12 col-md-12">Events I'm Attending</div>
                    <div class="user-event-name col-xs-8 col-sm-8 col-md-12"><a href="">Horror film festival(today)</a>
                    </div>
                    <div class="user-event-name col-xs-8 col-sm-8 col-md-12"><a href="">Grill(27 May)</a></div>
                </div>
                <div class="user-event-info-col col-xs-12 col-sm-4 col-md-3">
                    <div class="user-events-title col-xs-12 col-sm-12 col-md-12">Events I'm Organizing</div>
                    <div class="user-event-name col-xs-8 col-sm-8 col-md-12"><a href="">Berlin - Hamburg Hitchikking(5
                            July)</a></div>
                </div>
                <div class="user-event-info-col col-xs-12 col-sm-4 col-md-3">
                    <div class="user-events-title col-xs-12 col-sm-12 col-md-12">Events I'm Organizing</div>
                    <div class="user-event-name col-xs-8 col-sm-8 col-md-12"><a href="">Berlin - Hamburg Hitchikking(5
                            July)</a></div>
                </div>
            </div>
    </div>
@endsection