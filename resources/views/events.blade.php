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
                <div class="new-event-form-title">Creating new event</div>
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
                        @if ($errors->has('eventTitle'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('eventTitle') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div id="form-meeting">
                        <label for="eventPlace">Place</label>
                        <input type="text" id="eventPlace" name="eventPlace" class="form-control"
                               placeholder="Address">
                        @if ($errors->has('eventPlace'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('eventPlace') }}</strong>
                                    </span>
                        @endif
                        <label for="eventDate">Date</label>
                        <input type="date" name="eventDate" id="eventDate" class="form-control">
                        @if ($errors->has('eventDate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('eventDate') }}</strong>
                                    </span>
                        @endif
                        <label>Start time</label>
                        <input type="time" name="startTime" id="startTime"
                               class="form-control">
                        @if ($errors->has('startTime'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('startTime') }}</strong>
                                    </span>
                        @endif
                        <label>End time</label>
                        <input type="time" name="endTime" id="endTime" class="form-control">
                        @if ($errors->has('endTime'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('endTime') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div id="form-travel" class="form-travel">
                        <label for="destination">Destination</label>
                        <input type="text" id="destination" name="destination" class="form-control"
                               placeholder="Destination">
                        @if ($errors->has('destination'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('destination') }}</strong>
                                    </span>
                        @endif
                        <label for="arriveDate">Arrive date</label>
                        <input type="date" name="arriveDate" id="arriveDate" class="form-control">
                        @if ($errors->has('arriveDate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('arriveDate') }}</strong>
                                    </span>
                        @endif
                        <label for="departDate">Depart date</label>
                        <input type="date" name="departDate" id="departDate" class="form-control">
                        @if ($errors->has('departDate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('departDate') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <label for="eventPhoto">Photo</label>
                    <input type="image" name="eventPhoto" id="eventPhoto">
                    @if ($errors->has('eventPhoto'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('eventPhoto') }}</strong>
                                    </span>
                    @endif
                    <button type="submit" formaction="{{route('createEvent')}}" class="btn btn-primary create-btn">
                        Create
                    </button>
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