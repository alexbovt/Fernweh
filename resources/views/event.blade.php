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
            @endif
            @if(session()->get("creator") === 'true')
                <a href="/event_id{{$event->id_event}}/edit" class="btn join-event">Edit</a>
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
                <div>Comments ({{count($comments)}})</div>
            </div>
            <div class="event-comment">
                <img src="{{asset('img/man.jpg')}}" class="img-circle">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST">
                    {{ csrf_field() }}
                    <textarea name="inputComment" placeholder="Write a comment"></textarea>
                    <button type="submit" formaction="{{route('addComment',$event->id_event)}}" class="btn btn-primary">
                        Send
                    </button>
                </form>
            </div>
            @foreach($comments as $comment)
                <div class="event-comment">
                    <a href="/id{{$comment->id_user}}"><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <div class="event-people-info">
                        <ul>
                            <li><a href="/id{{$comment->id_user}}">{{$comment->name.' '.$comment->surname}}</a></li>
                            <li>
                                <div>{{$comment->text}}</div>
                            </li>
                            <li>
                                <div class="comment-date">{{$comment->created_at->format('d-M-y')}}</div>
                            </li>
                        </ul>
                    </div>
                    @if($user->id_user == $comment->id_user)
                        <a href="/event_id{{$event->id_event}}/deleteComment_id{{$comment->id_comment}}" ><span class="btn glyphicon glyphicon-remove"></span></a>
                    @else
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
                    @endif
                </div>
            @endforeach
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