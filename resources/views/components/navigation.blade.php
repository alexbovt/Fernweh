<nav id="top" class="navbar navbar-default">
    <div class=" navbar-collapse">
        <div class="col-xs-6 col-sm-6 col-md-3 ">
            <a href="/"> <img src="{{asset('img/logo.png')}}"></a>
        </div>
        <div class="col-xs-0 col-sm-6 col-md-3 col-md-push-6">
            <ul class="navbar-user nav navbar-nav">
                @if ($user = session()->get('user'))
                    @if($user->profile_status === 'user')
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
                    @else($user->profile_status === 'admin')
                        <a href="/admin"><span class="glyphicon glyphicon-modal-window glyphicon-icons"></span></a>
                        <a href="/messages"><span class="glyphicon glyphicon-envelope glyphicon-icons"></span></a>
                        <a href="#" class="drodropdown-toggle" data-toggle="dropdown">
                            <span class="navbar-user-name">{{ucfirst($user->name)}}</span>
                            <img src="{{asset('img/man.jpg')}}" class="img-circle nav-photo">
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/settings">Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="/logout">Log out</a></li>
                        </ul>
                    @endif
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
