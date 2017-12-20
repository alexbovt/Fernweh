<nav id="top" class="navbar navbar-default">
    <div class=" navbar-collapse">
        <div class="col-xs-6 col-sm-6 col-md-3 ">
            <a href="/"> <img src="{{asset('img/logo.png')}}"></a>
        </div>
        <div class="col-xs-0 col-sm-6 col-md-3 col-md-push-6">
            <ul class="navbar-user nav navbar-nav">
                @if ($user = session()->get('user'))

                    <a href="/events"><span class="glyphicon glyphicon-calendar glyphicon-icons"></span></a>
                    <a href="/friends"><span class="glyphicon glyphicon-user glyphicon-icons"></span></a>
                    <a href="/messages"><span class="glyphicon glyphicon-envelope glyphicon-icons"></span></a>
                    
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
                <!--
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span
                                class="caret"></span></a>
                    <div class="dropdown-menu">
                        <form class="form" role="form" method="post" action="login"
                              accept-charset="UTF-8"
                              id="login-nav">
                            <label class="form-group-label" for="exampleInputEmail2">Login</label>
                            <input type="text" class="form-control" id="exampleInputEmail2"
                                   placeholder="Login" required>
                            <label class="form-group-label" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                   placeholder="Password" required>
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </form>
                    </div>-->
                @endif
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-md-pull-3">
            <form class="navbar-form" method="POST">
                {{ csrf_field() }}
                <div class="input-group col-sm-12">
                    <input name="search" type="text" class="search-query form-control"
                           placeholder="Search events in city"/>
                    <span class="input-group-btn">
                        <button class="btn btn-search" formaction="/events/search" type="submit"><span
                                    class="glyphicon glyphicon-search"
                                    aria-hidden="true"></span></button>
                    </span>
                </div>
            </form>
        </div>

    </div>
</nav>
