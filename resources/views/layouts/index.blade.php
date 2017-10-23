<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('components.haed')
<body>
@include('components.navigation')
<div class="container">
    @yield('left-block')
    @yield('right-block')
</div>
<div class="footer-top-line"></div>
@include('components.footer')
</body>
</html>
