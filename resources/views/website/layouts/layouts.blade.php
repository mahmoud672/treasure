<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {!! $setting->lang->website_name !!} -    @yield('title')</title>

    @yield('open-graph')


<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Quper Construction template">
    <link rel="shortcut icon" href="{{assetPath("website/img/favicon.png")}}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{assetPath("website/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{assetPath("website/css/all.css")}}">

    <link rel="stylesheet" href="{{assetPath("website/css/slick.css")}}">
    <link rel="stylesheet" href="{{assetPath("website/css/slick-theme.css")}}">
    <link rel="stylesheet" href="{{assetPath("website/css/animate.css")}}">
    <link rel="stylesheet" href="{{assetPath("website/css/odometer.css")}}">
    <link rel="stylesheet" href="{{assetPath("website/css/magnifypopup.css")}}">

    <link rel="stylesheet" href="{{assetPath("website/css/icomoon/style.css")}}">
    <link rel="stylesheet" href="{{assetPath("website/css/jquery.mCustomScrollbar.min.css")}}">
    <!-- style CSS -->
    @if(currentLang() == 'en')
        <link rel="stylesheet" href="{{assetPath("website/css/style.css")}}">
    @endif
    @if(currentLang() == 'ar')
        <link rel="stylesheet" href="{{assetPath("website/css/style_ar.css")}}">
    @endif
    <link rel="stylesheet" href="{{assetPath("website/css/responsive.css")}}">
    @yield('canonical')
    <!-- end canonical links-->

    <!--Define social media profiles with schema.org markup -->

    @yield('customizedStyle')

    @yield('header-code')

</head>


<body>

<!-- Document Wrapper
============================================= -->
<div class="body_wrapper">
    <div id="preloader">
        <div class="product_name">Treasure</div>
    </div>
    @include('website.layouts.header')

    @yield('content')


    @include('website.layouts.footer')


</div>

<script src="{{assetPath("website/js/jquery-3.4.1.min.js")}}"></script>
<script src="{{assetPath("website/js/popper.min.js")}}"></script>
<script src="{{assetPath("website/js/bootstrap.min.js")}}"></script>
<script src="{{assetPath("website/js/slick.min.js")}}"></script>
<script src="{{assetPath("website/js/parallaxie.js")}}"></script>
<script src="{{assetPath("website/js/imagesloaded.pkgd.min.js")}}"></script>
<script src="{{assetPath("website/js/isotope.pkgd.min.js")}}"></script>
<script src="{{assetPath("website/js/three.min.js")}}"></script>
<script src="{{assetPath("website/js/TweenMax.min.js")}}"></script>
<script src="{{assetPath("website/js/hover.js")}}"></script>
<script src="{{assetPath("website/js/odometer.min.js")}}"></script>
<script src="{{assetPath("website/js/viewport.jquery.js")}}"></script>
<script src="{{assetPath("website/js/jquery.mCustomScrollbar.concat.min.js")}}"></script>
<script src="{{assetPath("website/js/parallax.js")}}"></script>
<script src="{{assetPath("website/js/jquery.magnific-popup.min.js")}}"></script>
<script src="{{assetPath("website/js/pace.min.js")}}"></script>
<script src="{{assetPath("website/js/wow.min.js")}}"></script>
<script src="{{assetPath("website/js/jquery.parallax-scroll.js")}}"></script>
<script src="{{assetPath("website/js/main.js")}}"></script>

@yield('customizedScript')



</body>
</html>
