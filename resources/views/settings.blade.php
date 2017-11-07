@extends('layouts.index')
@section('title')
    Settings
@endsection
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-2"></div>
            <div class="registration-form content col-md-8">
                <h3>Your profile settings</h3>
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="emailToUpdate">Email</label>
                        <input type="email" class="form-control" id="emailToUpdate" name="emailToUpdate"
                               aria-describedby="emailToUpdate"
                               placeholder="Input Email" value="{{$user->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('login') ? ' has-error' : '' }}">
                        <label for="loginToUpdate">Login</label>
                        <input type="text" class="form-control" id="loginToUpdate" name="loginToUpdate"
                               aria-describedby="loginToUpdate"
                               placeholder="Input login" value="{{$user->login}}">
                        @if ($errors->has('login'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="passwordToUpdate">Password</label>
                        <input type="password" class="form-control" id="passwordToUpdate" name="passwordToUpdate"
                               placeholder="Input password"
                               aria-describedby="passwordToUpdate" value="">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="confirmPasswordToUpdate">Confirm password</label>
                        <input type="password" class="form-control" id="confirmPasswordToUpdate"
                               name="confirmPasswordToUpdate"
                               placeholder="Confirm password"
                               aria-describedby="confirmPasswordToUpdate" value="">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <button type="submit" formaction="{{route('SettingsChangeUserData')}}" class="btn btn-primary">
                            Change
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-2"></div>
            <div class="registration-form content col-md-8">
                <h3>You can delete your account</h3>
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="passwordToUpdate">Password</label>
                        <input type="password" class="form-control" id="passwordToUpdate" name="passwordToUpdate"
                               placeholder="Input password"
                               aria-describedby="passwordToUpdate" value="">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="confirmPasswordToUpdate">Confirm password</label>
                        <input type="password" class="form-control" id="confirmPasswordToUpdate"
                               name="confirmPasswordToUpdate"
                               placeholder="Confirm password"
                               aria-describedby="confirmPasswordToUpdate" value="">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <button type="submit" formaction="{{route('DeleteAccount')}}" class="btn btn-danger">
                            Delete Account
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection