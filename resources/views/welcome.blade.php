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
            <h3>Sign in</h3>
            <form>
                <div class="form-group">
                    <label for="InputLogin">Login</label>
                    <input type="text" class="form-control" id="InputLogin" aria-describedby="Login"
                           placeholder="Enter login">
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="InputPassword" placeholder="Password">
                </div>
                <div class="col-md-5">
                    <button type="submit" formaction="login/InputLogin/InputPassword" class="btn btn-primary">Log in</button>
                </div>
                <div class="col-md-7">
                    <a href="">Forgot your password?</a>
                </div>
            </form>
        </div>
        <div class="registration-form content col-md-12">
            <h3>For the first time on Fernweh ?</h3>
            <h3>Sign up</h3>
            <form>
                <div class="form-group">
                    <label for="InputFirstName">Your first name</label>
                    <input type="text" class="form-control" id="InputFirstName" aria-describedby="First name"
                           placeholder="First name">
                </div>
                <div class="form-group">
                    <label for="InputLastName">Your Last name</label>
                    <input type="text" class="form-control" id="InputLastName" aria-describedby="Last name"
                           placeholder="Last name">
                </div>
                <div class="form-group">
                    <label for="InputEmail">Your email</label>
                    <input type="email" class="form-control" id="InputEmail" aria-describedby="Email address"
                           placeholder="Email address">
                </div>
                <div class="form-group">
                    <label for="InputNewLogin">Login</label>
                    <input type="text" class="form-control" id="InputNewLogin" aria-describedby="Login"
                           placeholder="Login">
                </div>
                <div class="form-group">
                    <label for="InputDateOfBirth">Date of birth</label>
                    <input type="date" class="form-control" id="InputDateOfBirth" aria-describedby="Date of birth">
                </div>
                <div class="form-group">
                    <label for="InputGender">Your gender</label>
                    <input type="radio" id="InputGender" value="male" placeholder="Male"> Male
                    <input type="radio" id="InputGender" value="female" placeholder="Female"> Female
                </div>
                <div class="form-group">
                    <label for="InputNewPassword">Enter password</label>
                    <input type="password" class="form-control" id="InputNewPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="RepeatPassword">Repeat password</label>
                    <input type="password" class="form-control" id="RepeatPassword" placeholder="Repeat password">
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button>
            </form>
        </div>
    </div>
@endsection