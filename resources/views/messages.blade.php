@extends('layouts.index')
@section('title')
    Messages
@endsection
@section('left-block')
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="messages-left-col col-xs-12 col-sm-12 col-md-12">
                <div class="messages-title col-xs-12 col-sm-12 col-md-12">Messages</div>
                @foreach($conversations as $conversation)
                    <div class="friends col-xs-12 col-sm-12 col-md-12">
                        <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                        <div class="friends-list">
                            <a href="/messages/sel={{$conversation->id_conversation}}">{{$conversation->name.' '.$conversation->surname}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endsection
        @section('right-block')
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="messages-right-col col-xs-12 col-sm-12 col-md-12">
                    @if($messages)
                        <div class="messages-right-col-title col-xs-12 col-sm-12 col-md-12">
                            <a href="/id{{$companion->id_user}}"><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                            <div class="messages-name">
                                <a href="">{{$companion->name.' '.$companion->surname}}</a>
                            </div>
                        </div>
                        <div id="refresh" class="messages">
                            <ul class="messages" id="messages">
                                @foreach($messages as $message)
                                    @if($message->id_sender === session()->get('user')->id_user)
                                        <li class="my-message">{{$message->text}}</li>
                                    @else
                                        <li class="other-message">{{$message->text}}</li>
                                    @endif
                                @endforeach
                            </ul>

                        </div>
                        <div class="new-message">
                            <form method="POST" class="new-message">
                                {{ csrf_field() }}
                                <textarea rows="1" name="inputMessage" placeholder="Write a message"
                                          id="new-message-area"></textarea>
                                <button type="submit"
                                        formaction="/messages/sel={{1}}/sendMessage"><span
                                            class="glyphicon glyphicon-send" id="send-message"></span></button>
                            </form>
                        </div>
                    @else
                        //wyberi dialg
                    @endif
                </div>
            </div>
    </div>
@endsection
