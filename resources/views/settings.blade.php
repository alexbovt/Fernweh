@extends('layouts.index')
@section('title')
    Settings
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="registration-form content col-md-8">
                <h3></h3>
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('firstNameToUpdate') ? ' has-error' : '' }}">
                        <label for="firstNameToUpdate">First name</label>
                        <input type="text" class="form-control" id="firstNameToUpdate" name="firstNameToUpdate"
                               aria-describedby="firstNameToUpdate" value="{{$user->name}}">
                        @if ($errors->has('firstNameToUpdate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('firstNameToUpdate') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('lastNameToUpdate') ? ' has-error' : '' }}">
                        <label for="lastNameToUpdate">Last name</label>
                        <input type="text" class="form-control" id="lastNameToUpdate" name="lastNameToUpdate"
                               aria-describedby="lastNameToUpdate" value="{{$user->surname}}">
                        @if ($errors->has('lastNameToUpdate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('lastNameToUpdate') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('emailToUpdate') ? ' has-error' : '' }}">
                        <label for="emailToUpdate">Email</label>
                        <input type="email" class="form-control" id="emailToUpdate" name="emailToUpdate"
                               aria-describedby="emailToUpdate"
                               placeholder="Input Email" value="{{$user->email}}">
                        @if ($errors->has('emailToUpdate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('emailToUpdate') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('loginToUpdate') ? ' has-error' : '' }}">
                        <label for="loginToUpdate">Login</label>
                        <input type="text" class="form-control" id="loginToUpdate" name="loginToUpdate"
                               aria-describedby="loginToUpdate"
                               placeholder="Input login" value="{{$user->login}}">
                        @if ($errors->has('loginToUpdate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('loginToUpdate') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('dateOfBirthToUpdate') ? ' has-error' : '' }}">
                        <label for="dateOfBirthToUpdate">Date of birth</label>
                        <input type="date" class="form-control" id="dateOfBirthToUpdate" name="dateOfBirthToUpdate"
                               placeholder="Your date of birth"
                               aria-describedby="dateOfBirthToUpdate" value="{{$user->birth_date}}">
                        @if ($errors->has('dateOfBirthToUpdate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('dateOfBirthToUpdate') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('genderToUpdate') ? ' has-error' : '' }}">
                        <input type="radio" name="genderToUpdate" id="male" value="male"/>
                        <label for="male">Male</label>
                        <input type="radio" name="genderToUpdate" id="female" value="female"/>
                        <label for="female">Female</label>
                    </div>
                    <div class="form-group  {{ $errors->has('passwordToUpdate') ? ' has-error' : '' }}">
                        <label for="passwordToUpdate">Password</label>
                        <input type="password" class="form-control" id="passwordToUpdate" name="passwordToUpdate"
                               placeholder="Input password"
                               aria-describedby="passwordToUpdate" value="">
                        @if ($errors->has('passwordToUpdate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('passwordToUpdate') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('confirmPasswordToUpdate') ? ' has-error' : '' }}">
                        <label for="confirmPasswordToUpdate">Confirm password</label>
                        <input type="password" class="form-control" id="confirmPasswordToUpdate"
                               name="confirmPasswordToUpdate"
                               placeholder="Confirm password"
                               aria-describedby="confirmPasswordToUpdate" value="">
                        @if ($errors->has('confirmPasswordToUpdate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('confirmPasswordToUpdate') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-md-5">
                        <button type="submit" formaction="{{route('changeUserData')}}" class="btn btn-primary">Change
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection