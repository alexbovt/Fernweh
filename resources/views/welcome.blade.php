{{require('../public/generator/generator.php')}}
@extends('layouts.index')
@section('title')
    Welcome
@endsection
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
@endsection
@section('left-block')
    <div class="info col-md-7">
        <div class="content">
            <h2>Fernweh - system for travelers</h2>
            <h3>We’re all connected by a love for travel!</h3>
            <img src="{{asset('/img/phone.png')}}" alt="">
        </div>
    </div>
@endsection
@section('right-block')
    Hello there
    <div class="forms col-md-5">
        <div class="login-form content col-md-12">
            {{ csrf_field() }}
            <div class="forms-title col-xs-12 col-sm-12 col-md-12">Sign in</div>
            @if (session('login_status'))
                <div class="alert alert-warning">
                    {{ session('login_status') }}
                </div>
            @endif
            <form name="loginForm" method="POST">
                {{ csrf_field() }}
                @if($msg)
                    <h4>{{$msg}}</h4>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div class="form-group {{ $errors->has('inputLogin') ? ' has-error' : '' }}">
                    <label for="InputLogin">Login</label>
                    <input type="text" class="form-control" id="inputLogin" name="inputLogin" aria-describedby="Login"
                           placeholder="Your login" value="{{ old('inputLogin') }}">
                    @if ($errors->has('inputLogin'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('inputLogin') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group  {{ $errors->has('inputPassword') ? ' has-error' : '' }}">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword"
                           placeholder="Your password"
                           aria-describedby="Password" value="{{old('inputPassword')}}">
                    @if ($errors->has('inputPassword'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('inputPassword') }}</strong>
                                    </span>
                    @endif
                </div>
<<<<<<< HEAD
                <div class="col-md-7">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="">Forgot your password?</a>
                </div>
                    <button name = "Login" type="submit" formaction="{{route('login')}}" class="btn btn-primary btn-settings">Log in
=======

                    <button type="submit" formaction="{{route('login')}}" class="btn btn-primary btn-settings">Log in
>>>>>>> 6c4b72f3e4d5a60688322c9a3a085c2ef86b954f
                    </button>
            </form>
        </div>
        <div class="registration-form content col-md-12">
            <div class="forms-title col-xs-12 col-sm-12 col-md-12">For the first time on Fernweh ?</div>
            <h4>Write your full name and click continue to sign up</h4>
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('inputFirstName') ? ' has-error' : '' }}">
                            <label for="inputFirstName">First name</label>
                            <input type="text" class="form-control" id="inputFirstName" name="inputFirstName"
                                   aria-describedby="inputFirstName"
                                   placeholder="Yout first name" value="{{ old('inputFirstName') }}">
                            @if ($errors->has('inputFirstName'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('inputFirstName') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group  {{ $errors->has('inputLastName') ? ' has-error' : '' }}">
                            <label for="inputLastName">Last name</label>
                            <input type="text" class="form-control" id="inputLastName" name="inputLastName"
                                   placeholder="Your last name"
                                   aria-describedby="inputLastName" value="{{old('inputLastName')}}">
                            @if ($errors->has('inputLastName'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('inputLastName') }}</strong>
                                    </span>
                            @endif
                        </div>
                            <button type="submit" formaction="{{route('register')}}" class="btn btn-primary btn-settings">Continue
                            </button>
                    </form>
        </div>
    </div>
@endsection
