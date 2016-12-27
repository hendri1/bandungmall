@extends('user.templates.layout')

@section('content')

<div class="container main-container headerOffset">

    <div class="row">

        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span> Login ke Bandungmall</span></h1>

            <div class="row userInfo">

                <div class="col-xs-12 col-sm-8">
                    @if (Session::has('error_code'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('error_code') }}
                    </div>
                    @endif
                    <form role="form" class="logForm" action="{{ URL::to('user/login/doLogin') }}" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="checkbox">
                            <label> <input type="checkbox" name="checkbox"> Ingat saya </label>
                        </div>
                        <div class="form-group pull-right">
                            <p><a title="Recover your forgotten password" href="{{ URL::to('user/forgotPassword') }}">Lupa password? </a></p>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Sign In</button>


                    </form>
                    <!--userForm-->
<div style="margin-top:5px;">
<a href="{{ URL::to('user/login/fb') }}"><img src="{{ url('public/img/login-fb.png') }}" width="30%" height="auto"/></a>
<a href="{{ URL::to('user/login/google') }}"><img src="{{ url('public/img/login-google.png') }}" width="30%" height="auto"/></a>
</div>
                </div>
            </div>
            <!--/row end-->

        </div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /wrapper -->

@stop