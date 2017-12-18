<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('components.head')
<body>
@include('components.navigation')
<div class="container">
    @yield('content')
    @yield('left-block')
    @yield('right-block')
</div>
<div class="footer-top-line"></div>
<script type="text/javascript" src="{{asset('/js/main.js')}}"></script>
<!--<script src="js/app.js" charset="utf-8"></script>-->
</body>
</html>
