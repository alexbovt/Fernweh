<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fernweh</title>
    <link rel="icon" href="{{asset('/png/LogoInTab.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <script src="https://use.fontawesome.com/5f00eddeaf.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class=" navbar-collapse">
        <div class="col-xs-6 col-sm-6 col-md-3 ">
            @if (Auth::guest())
                <a href="/"> <img src="{{asset('img/logo.png')}}"></a>
            @else
                <a href="/home"> <img src="{{asset('img/logo.png')}}"></a>
            @endif
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-md-push-6">
            <ul class="navbar-user nav navbar-nav">
                @if (Auth::guest())
                    <a href="/profile"><span class="glyphicon glyphicon-user glyphicon-icons"></span></a>
                    <a href="/messeges"><span class="glyphicon glyphicon-envelope glyphicon-icons"></span></a>
                    <a href="/settings"><span class="glyphicon glyphicon-cog glyphicon-icons"></span></a>
                @endif
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-pull-3">
            <form class="navbar-form" role="search">
                <div class="input-group col-sm-12">
                    <input type="text" class="search-query form-control" placeholder="Search"/>
                    <span class="input-group-btn">
                        <button class="btn btn-search" type="button"><span class="glyphicon glyphicon-search"
                                                                           aria-hidden="true"></span></button>
                    </span>
                </div>
            </form>
        </div>

    </div>
</nav>

<div class="container">
    <div class="info col-md-7">
        <div class="content">
            <h3>Fernweh for mobile devices</h3>
            <h4>Install our official mobile app and stay in touch with your friends anytime and anywhere.</h4>
            <img src="{{asset('/img/phone.png')}}" alt="">
        </div>
    </div>
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
                    <button type="submit" class="btn btn-primary">Log in</button>
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
</div>
<div class="footer-top-line"></div>
<div class="footer">
    <div class="container">
        <div class="col-md-9">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, facere.
        </div>
        <div class="col-md-3">
            Lorem ipsum dolor sit amet.
        </div>
    </div>
</div>
</body>
</html>
