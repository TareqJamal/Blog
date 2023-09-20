<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('Site.Includes.css')
</head>
<body>
<div class="site-wrap">
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    @include('Site.Layouts.header')
    @yield('content')
    @include('Site.Layouts.footer')
</div>
@include('Site.Includes.js')
</body>
</html>
