@extends('layouts.index')
@section('content');
<div class="col-md-2"></div>
<div class="login-form content col-md-8">
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
<div class="col-md-2"></div>
@endsection