<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{ asset('public/assets/common/images/icon.png') }}">
<title>Bandungmall - {{ $title or "" }}</title>

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!--MAIN STYLE-->
<link href="{{ asset('public/assets/user/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/user/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/user/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/user/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/user/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/user/css/font-awesome.min.css') }}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{ asset('public/assets/user/css/custom.css') }}" rel="stylesheet">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/user/rs-plugin/css/settings.css') }}" media="screen" />

@yield('stylesheet')

<!-- JavaScripts -->
<script src="{{ asset('public/assets/user/js/modernizr.js') }}"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

@include('user.templates.loader')

@include('user.templates.login_modal')

@include('user.templates.signup_modal')

@include('user.templates.search_modal')

<!-- Page Wrap -->
<div id="wrap"> 
@include('user.templates.header')

{{-- @yield('content') 

<div class="white-bg gap"></div>
@include('user.templates.footer')
</div>

--}}

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="{{ asset('public/assets/user/js/bootstrap.min.js') }}"></script>
<!-- Wrap End --> 
<script src="{{ asset('public/assets/user/js/jquery-1.11.3.js') }}"></script> 
<script src="{{ asset('public/assets/user/js/wow.min.js') }}"></script> 
<script src="{{ asset('public/assets/user/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('public/assets/user/js/own-menu.js') }}"></script> 
<script src="{{ asset('public/assets/user/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('public/assets/user/js/jquery.magnific-popup.min.js') }}"></script> 
<script src="{{ asset('public/assets/user/js/jquery.flexslider-min.js') }}"></script> 
<script src="{{ asset('public/assets/user/js/jquery.isotope.min.js') }}"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{ asset('public/assets/user/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/assets/user/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> 
<script src="{{ asset('public/assets/user/js/main.js') }}"></script>
</body>
</html>
