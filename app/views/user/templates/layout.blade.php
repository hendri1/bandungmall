<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('public/assets/common/images/icon.png') }}">
    <title>Bandungmall - {{ $title or "" }}</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/assets/user/bootstrap/css/bootstrap.css" rel="stylesheet') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('public/assets/user/css/style.css') }}" rel="stylesheet">
    
    @yield('stylesheet')

    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- include pace script for automatic web page progress bar  -->

    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="{{ asset('public/assets/user/js/pace.min.js') }}"></script>
</head>

<body>

@include('user.templates.login_modal')
@include('user.templates.signup_modal')
@include('user.templates.search_modal')
@include('user.templates.header')

@yield('content')

<div class="white-bg gap"></div>
@include('user.templates.footer')

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="{{ asset('public/assets/user/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- jquery-migrate only for product details -->
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>

<!-- include smoothproducts // product zoom plugin  -->
<script type="text/javascript" src="{{ asset('public/assets/user/js/smoothproducts-thumb.js') }}"></script>

<!-- include to give ratings -->
<script src="{{ asset('public/assets/user/plugins/rating/bootstrap-rating.min.js') }}"></script>

<!-- include jqueryCycle plugin -->
<script src="{{ asset('public/assets/user/js/jquery.cycle2.min.js') }}"></script>

<!-- include easing plugin -->
<script src="{{ asset('public/assets/user/js/jquery.easing.1.3.js') }}"></script>

<!-- include  parallax plugin -->
<script type="text/javascript" src="{{ asset('public/assets/user/js/jquery.parallax-1.1.js') }}"></script>

<!-- optionally include helper plugins -->
<script type="text/javascript" src="{{ asset('public/assets/user/js/helper-plugins/jquery.mousewheel.min.js') }}"></script>

<!-- include mCustomScrollbar plugin //Custom Scrollbar  -->
<script type="text/javascript" src="{{ asset('public/assets/user/js/jquery.mCustomScrollbar.js') }}"></script>

<!-- include icheck plugin // customized checkboxes and radio buttons   -->
<script type="text/javascript" src="{{ asset('public/assets/user/plugins/icheck-1.x/icheck.min.js') }}"></script>

<!-- include grid.js // for equal Div height  -->
<script src="{{ asset('public/assets/user/js/grids.js') }}"></script>

<!-- include carousel slider plugin  -->
<script src="{{ asset('public/assets/user/js/owl.carousel.min.js') }}"></script>

<!-- jQuery select2 // custom select   -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<!-- include touchspin.js // touch friendly input spinner component   -->
<script src="{{ asset('public/assets/user/js/bootstrap.touchspin.js') }}"></script>

<!-- include custom script for site  -->
<script src="{{ asset('public/assets/user/js/script.js') }}"></script>

@yield('javascript')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5860a397ddb8373fd2b37fbc/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
