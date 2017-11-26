@extends('layouts.index')
@section('title')
    {{$event->event_name}}
@endsection
@section('left-block')
    <div class="container">
        <div class="event-info-col col-xs-12 col-sm-12 col-md-12">
            <div class="event-img"><img src="{{asset('img/event1.jpg')}}"></div>
            <div class="event-name">{{$event->event_name}}</div>
            <div class="event-button-group col-sm-5 col-md-3">
                @if(session()->get("attendance") === 'false')
                    <a href="/event_id{{$event->id_event}}/join" class="btn btn-info join-event">Join</a>
                @elseif(session()->get("attendance") === 'true')
                    <a href="/event_id{{$event->id_event}}/leave" class="btn btn-info join-event">Leave</a>
                @endif
                @if(session()->get("creator") === 'true')
                    <a id="elem" class="btn btn-info join-event">Edit</a>

                    <div id="new-event-form">
                        <span id="new-event-form-close">X</span>
                        <div class="new-event-form-title">Changing event information</div>
                        <form method="POST">
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
                            @if($event->type === 'Meeting')
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
                            @else
                                <div id="form-meeting" class="form-meeting">
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
                            @endif
                            <label for="eventPhoto">Photo</label>
                            <input type="image" name="eventPhoto" id="eventPhoto">
                            @if ($errors->has('eventPhoto'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('eventPhoto') }}</strong>
                                    </span>
                            @endif
                            <button type="submit" formaction="{{route('createEvent')}}" class="btn btn-primary create-btn">
                                Save
                            </button>
                        </form>
                    </div>
                    <a id="delete-event" class="btn btn-danger delete-event">Delete</a>
                    <div id="delete-event-form">
                        <span id="delete-event-form-close">X</span>
                        <div class="delete-event-form-title">Are you sure you want to delete this event?</div>
                        <input type="reset" class="btn join-event" id="delete-event-resignation" value="No">
                        <a href="/event_id{{$event->id_event}}/delete" class="btn  delete-event">Yes</a>
                    </div>
            </div>

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
        <div class="event-description-col col-xs-12 col-sm-8 col-md-8">
            <div class="event-comments-title">
                <span class="glyphicon glyphicon-comment"></span>
                <div>Comments (5)</div>
            </div>
            <div class="event-comment">
                <img src="{{asset('img/man.jpg')}}" class="img-circle">
                <textarea placeholder="Write a comment"></textarea>
                <button class="btn" id="send-comment">Send</button>
            </div>
            <div class="event-comment">
                <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                <div class="event-people-info">
                    <ul>
                        <li><a href="">Name Surname</a></li>
                        <li>
                            <div>Friendly reminder that this event is this weekend.</div>
                        </li>
                        <li>
                            <div class="comment-date">3 days ago</div>
                        </li>
                    </ul>
                </div>
                <a id="elem"><span class="btn glyphicon glyphicon-warning-sign"></span></a>
                <div id="new-event-form">
                    <span id="new-event-form-close">X</span>
                    <div class="event">Report post</div>
                    <form method="POST">
                        <div class="form-group">
                            <label for="">What's happening?</label>
                            <div class="form-report">
                                <p><input type="radio" name="report" value="spam" checked>It's spam</p>
                                <p><input type="radio" name="report" value="verbal">Verbal abuse</p>
                                <p><input type="radio" name="report" value="violence">Violence or extremism</p>
                                <p><input type="radio" name="report" value="other">Other</p>
                                <p><textarea></textarea></p>
                                <input type="submit" class="btn btn-primary" value="Report">
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="event-comment">
                <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                <div class="event-people-info">
                    <ul>
                        <li><a href="">Name Surname</a></li>
                        <li>
                            <div>Friendly reminder that this event is this weekend.</div>
                        </li>
                        <li>
                            <div class="comment-date">7 days ago</div>
                        </li>
                    </ul>
                </div>
                <a id="elem"><span class="btn glyphicon glyphicon-warning-sign"></span></a>
                <div id="new-event-form">
                    <span id="new-event-form-close">X</span>
                    <div class="event">Report post</div>
                    <form method="POST">
                        <div class="form-group">
                            <label for="">What's happening?</label>
                            <div class="form-report">
                                <p><input type="radio" name="report" value="spam" checked>It's spam</p>
                                <p><input type="radio" name="report" value="verbal">Verbal abuse</p>
                                <p><input type="radio" name="report" value="violence">Violence or extremism</p>
                                <p><input type="radio" name="report" value="other">Other</p>
                                <p><textarea name="" cols="" rows="3"></textarea></p>
                                <input type="submit" class="btn btn-primary" value="Report">
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="overlay"></div>
            </div>
        </div>
        @endsection
        @section('right-block')
            <div class="event-people-list-col col-xs-12 col-sm-4 col-md-3">
                <div class="event-people-list col-xs-12 col-sm-12 col-md-12">
                    <div class="event-people-list-title">Attending({{count($event_people_list)}})</div>
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