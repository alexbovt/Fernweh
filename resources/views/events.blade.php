@extends('layouts.index')
@section('title')
    Events
@endsection
@section('left-block')
    <div class="container">
        <div class="event-info-col col-xs-8 col-sm-8 col-md-7">
            <div class="event col-xs-10 col-sm-10 col-md-11">Events in {{$address->city}}</div>
            <a id="elem"><span
                        class="add-event glyphicon glyphicon-plus-sign col-xs-2 col-sm-2 col-md-1"></span></a>
            <div id="new-event-form">
                <span id="new-event-form-close">X</span>
                <div class="event">Creating new event</div>
                <form method="POST">
                    <div class="form-group">
                        <label for="eventType">Event type</label>
                        <input type="radio" name="eventType" id="meeting" value="meeting" checked>Meeting
                        <input type="radio" name="eventType" id="travel" value="travel">Travel
                    </div>
                    <div class="form-group">
                        <label for="eventTitle">Title</label>
                        <input type="text" id="eventTitle" name="eventTitle" class="form-control"
                               placeholder="Event title">
                    </div>
                    <div id="form-meeting">
                        <label>Place</label>
                        <input type="text" id="form-meeting" name="" class="form-control"
                               placeholder="">
                        <label>Date</label>
                        <p><input type="date" class="form-control"></p>
                        <p>Start time<input type="time" name="" id="" class="form-control">
                            End time<input type="time" name="" id="" class="form-control"></p>
                        <label>Photo</label>
                        <p><input type="image" name="" id=""></p>
                        <button type="submit" formaction="{{route('createEvent')}}" class="btn btn-primary">
                            Create
                        </button>
                    </div>
                    <div id="form-travel" class="form-travel">
                        <label>Destination</label>
                        <input type="text" id="form-travel" name="" class="form-control"
                               placeholder="">
                        <label>Arrive date<input type="date" name="" id="" class="form-control"></label>
                        <label> Depart date<input type="date" name="" id="" class="form-control"></label><br/>
                        <label>Photo</label>
                        <p><input type="image" name="" id=""></p>

                    </div>
                </form>
            </div>
            <div id="overlay"></div>
            @if (session('status'))
                <div class="events col-xs-12 col-sm-12 col-md-12 alert alert-warning">
                    {{ session('status') }}
                </div>
            @endif
            @if(session('events_status'))
                <div class="events col-xs-12 col-sm-12 col-md-12 alert alert-warning">
                    {{ session('events_status')  }}
                </div>
            @else
                @foreach($events as $event)
                    <div class="events col-xs-12 col-sm-12 col-md-12">
                        <div class="top-line"></div>
                        <a href="/event_id{{$event->id_event}}">
                            <div class="events-img col-xs-4 col-sm-4 col-md-5"><img src="{{asset('img/event1.jpg')}}">
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
                        <a id="elem-attending-people-list\{{$event->id_event}}"><span
                                    class="col-xs-8 col-sm-8 col-md-7">{{count($events)}}</span></a>
                        <div id="attending-people-list">
                            <span id="attending-people-list-close" class="glyphicon glyphicon-remove"></span>
                            <div id="test" class="attending-people-list-tittle">People who attend event</div>
                        </div>
                        <div id="overlay"></div>
                    </div>
                @endforeach
            @endif
        </div>
        @endsection
        @section('right-block')
            <div class="container">
                <div class="user-event-info-col col-xs-12 col-sm-4 col-md-3">
                    <div class="user-events-title col-xs-12 col-sm-12 col-md-12">Events I'm Attending</div>
                    @foreach($attending_events as $attending_event)
                        <div class="user-event-name col-xs-8 col-sm-8 col-md-12">
                            <a href="/event_id{{$attending_event->id_event}}">
                                {{$attending_event->event_name}}
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="user-event-info-col col-xs-12 col-sm-4 col-md-3">
                    <div class="user-events-title col-xs-12 col-sm-12 col-md-12">Events I'm Organizing</div>
                    @foreach($organizing_events as $organizing_event)
                        <div class="user-event-name col-xs-8 col-sm-8 col-md-12">
                            <a href="/event_id{{$organizing_event->id_event}}">
                                {{$organizing_event->event_name}}
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="user-event-info-col col-xs-12 col-sm-12 col-md-3">
                    <div class="user-events-title col-xs-12 col-sm-12 col-md-12">Visited Events</div>
                    <div class="user-event-name col-xs-8 col-sm-8 col-md-12"><a href="">Berlin - Hamburg Hitchikking(5
                            July)</a></div>
                </div>
            </div>
    </div>
@endsection