@extends('layouts.index')
@section('title')
    Messages
@endsection
@section('left-block')
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="messages-left-col col-xs-12 col-sm-12 col-md-12">
                <div class="friends-title col-xs-12 col-sm-12 col-md-12">Messages</div>
                <div class="friends col-xs-12 col-sm-12 col-md-12">
                    <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <div class="friends-list">
                        <ul>
                            <li><a href="">Name Surname</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('right-block')
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="messages-right-col col-xs-12 col-sm-12 col-md-12">
                    <div class="messages-right-col-title col-xs-12 col-sm-12 col-md-12">
                        <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                        <div class="messages-name">
                            <ul>
                                <li><a href="">Name Surname</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="messages" >
                        <ul class="messages" id="messages">
                            <li class="other-message start">By Other User</li>
                            <li class="other-message">By Other User</li>
                            <li class="other-message end">By Other User</li>

                            <li class="my-message start">By this User, first message</li>
                            <li class="my-message">By this User, secon dmessage</li>
                            <li class="my-message">By this User, third message</li>
                            <li class="my-message end">By this User, fourth message</li>

                            <li class="other-message start">By Other User</li>
                            <li class="other-message">By Other User</li>
                            <li class="other-message end">By Other User</li>

                            <li class="my-message start">By this User, first message</li>
                            <li class="my-message">By this User, second message</li>
                            <li class="my-message">By this User, third message</li>
                            <li class="my-message end">By this User, fourth message</li>
                        </ul>
                    </div>
                    <div class="new-message">
                        <form method="POST" class="new-message">
                            <textarea rows="1" name="inputMessage" placeholder="Write a message"
                                      id="new-message-area"></textarea>
                            <span class="glyphicon glyphicon-send" id="send-message"></span>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
