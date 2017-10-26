@extends('layouts.index')
@section('title')
    Welocome
@endsection
@section('left-block')
    <div class="info col-md-7">
        <div class="content">
            <h3>Fernweh for mobile devices</h3>
            <h4>Install our official mobile app and stay in touch with your friends anytime and anywhere.</h4>
            <img src="{{asset('/img/phone.png')}}" alt="">
        </div>
    </div>
@endsection
@section('right-block')
    <div class="forms col-md-5">
        <div class="login-form content col-md-12">
            {{ csrf_field() }}
            <h3>Sign in</h3>
            <form method="POST">
                {{ csrf_field() }}
                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
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
                                        <strong>{{ $errors->first('inputLogin') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-md-5">
                    <button type="submit" formaction="{{route('login')}}" class="btn btn-primary">Log in</button>
                </div>
                <div class="col-md-7">
                    <a href="">Forgot your password?</a>
                </div>
            </form>
        </div>
        <div class="registration-form content col-md-12">
            <h3>For the first time on Fernweh ?</h3>
            <h4>Write your full name and click continue to sign up
                <h4>
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
                        <div class="col-md-5">
                            <button type="submit" formaction="{{route('register')}}" class="btn btn-primary">Continue
                            </button>
                        </div>
                    </form>
        </div>
    </div>
@endsection
