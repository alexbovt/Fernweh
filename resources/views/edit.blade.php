@extends('layouts.index')
@section('title')
    Edit
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
                <div class="settings-title col-xc-12 col-sm-12 col-md-12">Your profile information</div>
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="firstNameToUpdate">First name</label>
                        <input type="text" class="form-control" id="firstNameToUpdate" name="firstNameToUpdate"
                               aria-describedby="firstNameToUpdate" value="{{$user->name}}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('surname') ? ' has-error' : '' }}">
                        <label for="lastNameToUpdate">Last name</label>
                        <input type="text" class="form-control" id="lastNameToUpdate" name="lastNameToUpdate"
                               aria-describedby="lastNameToUpdate" value="{{$user->surname}}">
                        @if ($errors->has('surname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('birth_date') ? ' has-error' : '' }}">
                        <label for="dateOfBirthToUpdate">Date of birth</label>
                        <input type="date" class="form-control" id="dateOfBirthToUpdate" name="dateOfBirthToUpdate"
                               placeholder="Your date of birth"
                               aria-describedby="dateOfBirthToUpdate" value="{{$user->birth_date}}">
                        @if ($errors->has('birth_date'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                        @endif
                    </div>
                    @if($user->sex === 'male')
                        <div class="form-group  {{ $errors->has('sex') ? ' has-error' : '' }}">
                            <input type="radio" name="genderToUpdate" id="male" value="male" checked/>
                            <label for="male">Male</label>
                            <input type="radio" name="genderToUpdate" id="female" value="female"/>
                            <label for="female">Female</label>
                        </div>
                        @if ($errors->has('sex'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                        @endif

                    @else
                        <div class="form-group  {{ $errors->has('genderToUpdate') ? ' has-error' : '' }}">
                            <input type="radio" name="genderToUpdate" id="male" value="male"/>
                            <label for="male">Male</label>
                            <input type="radio" name="genderToUpdate" id="female" value="female" checked/>
                            <label for="female">Female</label>
                        </div>
                        @if ($errors->has('sex'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                        @endif
                    @endif
                    <div class="form-group  {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                        <label for="phoneNumberToUpdate">Phone number</label>
                        <input type="text" class="form-control" id="phoneNumberToUpdate"
                               name="phoneNumberToUpdate"
                               aria-describedby="phoneNumberToUpdate" value="{{$user->phone_number}}">
                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('education') ? ' has-error' : '' }}">
                        <label for="educationToUpdate">Education</label>
                        <input type="text" class="form-control" id="educationToUpdate"
                               name="educationToUpdate"
                               aria-describedby="educationToUpdate" value="{{$user->education}}">
                        @if ($errors->has('education'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('languages') ? ' has-error' : '' }}">
                        <label for="languagesToUpdate">Languages</label>
                        <input type="text" class="form-control" id="languagesToUpdate"
                               name="languagesToUpdate"
                               aria-describedby="languagesToUpdate" value="{{$user->languages}}">
                        @if ($errors->has('languages'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('languages') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('job') ? ' has-error' : '' }}">
                        <label for="jobToUpdate">Job</label>
                        <input type="text" class="form-control" id="jobToUpdate" name="jobToUpdate"
                               aria-describedby="jobToUpdate" value="{{$user->job}}">
                        @if ($errors->has('job'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('job') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('countries') ? ' has-error' : '' }}">
                        <label for="countriesToUpdate">Countries</label>
                        <input type="text" class="form-control" id="countriesToUpdate"
                               name="countriesToUpdate"
                               aria-describedby="countriesToUpdate" value="{{$user->countries}}">
                        @if ($errors->has('countries'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('countries') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('notes') ? ' has-error' : '' }}">
                        <label for="notesToUpdate">Notes</label>
                        <input type="text" class="form-control" id="notesToUpdate" name="notesToUpdate"
                               aria-describedby="notesToUpdate" value="{{$user->notes}}">
                        @if ($errors->has('notes'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                        @endif
                    </div>
                        <button type="submit" formaction="{{route('EditChangeUserData')}}" class="btn btn-primary btn-settings">
                            Change
                        </button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection