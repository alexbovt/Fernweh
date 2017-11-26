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