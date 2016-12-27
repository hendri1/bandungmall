@extends('user.templates.layout')

@section('content')

<div class="container main-container headerOffset">

    <div class="row">

        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span> Register di Bandungmall</span></h1>

            <div class="row userInfo">

                <div class="col-xs-12 col-sm-8">
                    @if (Session::has('error_code'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('error_code') }}
                    </div>
                    @endif
                    <form role="form" class="logForm" action="{{ URL::to('user/register/doRegister') }}" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input name="confirm_password" type="password" class="form-control" placeholder="Konfirmasi Password" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Depan</label>
                            <input name="first_name" type="text" class="form-control" placeholder="Nama Depan" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Belakang</label>
                            <input name="last_name" type="text" class="form-control" placeholder="Nama Belakang" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Register</button>


                    </form>
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