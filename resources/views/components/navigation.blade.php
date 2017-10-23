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