@extends('layouts.index')
@section('title')
    Settings
@endsection
@section('content')
    <div class="container col-md-offset-2">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <div class="registration-form content col-md-8">
                <div class="settings-title col-xc-12 col-sm-12 col-md-12">Your profile settings</div>
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
                        <span id="passStrength"></span>
                        <input type="password" class="form-control" id="inputPassword" name="passwordToUpdate"
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
                        <span id="passCheck"></span>
                        <input type="password" class="form-control" id="inputConfirmPassword"
                               name="confirmPasswordToUpdate"
                               placeholder="Confirm password"
                               aria-describedby="confirmPasswordToUpdate" value="">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                        <button type="submit" formaction="{{route('SettingsChangeUserData')}}" class="btn btn-primary btn-settings">
                            Change
                        </button>
                </form>
            </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <div class="registration-form content col-md-8">
                <div class="settings-title col-xc-12 col-sm-12 col-md-12">You can delete your account</div>
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="passwordToUpdate">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="passwordToUpdate"
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
                        <span id="passCheck"></span>
                        <input type="password" class="form-control" id="inputConfirmPassword"
                               name="confirmPasswordToUpdate"
                               placeholder="Confirm password"
                               aria-describedby="confirmPasswordToUpdate" value="">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                        <button type="submit" formaction="{{route('DeleteAccount')}}" class="btn btn-danger btn-settings">
                            Delete Account
                        </button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
@endsection