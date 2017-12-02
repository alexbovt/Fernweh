@extends('layouts.index')
@section('title')
    Messages
@endsection
@section('left-block')
    <div class="container">
        <div class="friends-left-col col-xs-12 col-sm-12 col-md-8">
            <div class="friends-title col-xs-12 col-sm-12 col-md-12">Messages</div>
            @foreach($friends as $friend)
                <div class="friends col-xs-12 col-sm-12 col-md-12">
                    <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                    <div class="friends-list">
                            <li><a href="/id{{$friend->id_user}}">{{$friend->name.' '.$friend->surname}}</a></li>
                    </div>
                </div>
            @endforeach
        </div>
        @endsection
            @section('right-block')
                <div class="col-md-8 messages-block">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque fuga, minima? Commodi consequuntur,
                    eum
                    laborum magni maiores nulla perferendis similique?
                </div>
    </div>
@endsection
