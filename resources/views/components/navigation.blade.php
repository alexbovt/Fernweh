<nav id="top" class="navbar navbar-default">
    <div class=" navbar-collapse">
        <div class="col-xs-6 col-sm-6 col-md-3 ">
            <a href="/"> <img src="{{asset('img/logo.png')}}"></a>
        </div>
        <div class="col-xs-0 col-sm-6 col-md-3 col-md-push-6">
            <ul class="navbar-user nav navbar-nav">
                @if ($user = session()->get('user'))
                    <a href="/messeges"><span class="glyphicon glyphicon-envelope glyphicon-icons"></span></a>
                    <a href="/events"><span class="glyphicon glyphicon-calendar glyphicon-icons"></span></a>
                    <a href="#" class="drodropdown-toggle" data-toggle="dropdown">
                        <span class="navbar-user-name">{{ucfirst($user->name)}}</span>
                        <img src="{{asset('img/man.jpg')}}" class="img-circle nav-photo">
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/id{{$user->id_user}}">My profile</a></li>
                        <li class="divider"></li>
                        <li><a href="/edit">Edit</a></li>
                        <li><a href="/settings">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout">Log out</a></li>
                    </ul>
                @else
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <form class="form" role="form" method="post" action="login"
                                  accept-charset="UTF-8"
                                  id="login-nav">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2"
                                           placeholder="Email address" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2"
                                           placeholder="Password" required>
                                    <div class="help-block text-right"><a href="">Forget the password ?</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> keep me logged-in
                                    </label>
                                </div>
                            </form>
                            <div class="bottom text-center">
                                New here ? <a href="#"><b>Join Us</b></a>
                            </div>
                        </li>
                    </ul>
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
