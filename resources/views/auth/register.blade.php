@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="registration-form content col-md-8">
                <h3>Registration</h3>
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('inputFirstName') ? ' has-error' : '' }}">
                        <label for="inputFirstName">First name</label>
                        <input type="text" class="form-control" id="inputFirstName" name="inputFirstName"
                               aria-describedby="inputFirstName" value="{{$fullName['firstName']}}">
                        @if ($errors->has('inputFirstName'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('inputFirstName') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('inputLastName') ? ' has-error' : '' }}">
                        <label for="inputLastName">Last name</label>
                        <input type="text" class="form-control" id="inputLastName" name="inputLastName"
                               aria-describedby="inputLastName" value="{{$fullName['lastName']}}">
                        @if ($errors->has('inputLastName'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('inputLastName') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('inputEmail') ? ' has-error' : '' }}">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                               aria-describedby="inputEmail"
                               placeholder="Input Email" value="{{ old('inputEmail') }}">
                        @if ($errors->has('inputEmail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('inputEmail') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('inputLogin') ? ' has-error' : '' }}">
                        <label for="inputLogin">Login</label>
                        <input type="text" class="form-control" id="inputLogin" name="inputLogin"
                               aria-describedby="inputLogin"
                               placeholder="Input login" value="{{ old('inputLogin') }}">
                        @if ($errors->has('inputLogin'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('inputLogin') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('inputCountry') ? ' has-error' : '' }}">
                        <label for="inputCountry">Country</label>
                        <input type="text" class="form-control" id="inputCountry" name="inputCountry"
                               aria-describedby="inputCountry"
                               placeholder="Input Country" value="{{ old('inputCountry') }}">
                        @if ($errors->has('inputCountry'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('inputCountry') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('inputCity') ? ' has-error' : '' }}">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" name="inputCity"
                               aria-describedby="inputCity"
                               placeholder="Input City" value="{{ old('inputCity') }}">
                        @if ($errors->has('inputCity'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('inputCity') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('inputDateOfBirth') ? ' has-error' : '' }}">
                        <label for="inputDateOfBirth">Date of birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="inputDateOfBirth"
                               placeholder="Your date of birth"
                               aria-describedby="inputDateOfBirth" value="{{old('inputDateOfBirth')}}">
                        @if ($errors->has('inputDateOfBirth'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('inputGender') ? ' has-error' : '' }}">
                        <input type="radio" name="inputGender" id="male" value="male"/>
                        <label for="male">Male</label>
                        <input type="radio" name="inputGender" id="female" value="female"/>
                        <label for="female">Female</label>
                    </div>
                    <div class="form-group  {{ $errors->has('inputPassword') ? ' has-error' : '' }}">
                        <label for="inputPassword">Password</label>
                        <span id="passStrength"></span>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword"
                               placeholder="Input password"
                               aria-describedby="inputPassword" value="">
                        @if ($errors->has('inputPassword'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('inputPassword') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="inputConfirmPassword">Confirm password</label>
                        <span id="passCheck"></span>
                        <input type="password" class="form-control" id="inputConfirmPassword"
                               name="inputConfirmPassword"
                               placeholder="Confirm password"
                               aria-describedby="inputConfirmPassword" value="">
                        @if ($errors->has('inputConfirmPassword'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('inputConfirmPassword') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-md-5">
                        <button type="submit" formaction="{{route('registration')}}" class="btn btn-primary">Sign up
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
