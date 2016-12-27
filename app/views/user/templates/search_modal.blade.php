<!-- Modal Signup start -->
<form role="form" action="{{URL::to('product?')}}" method="get">
    <div class="modal signUpContent fade" id="ModalSearch" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    <h3 class="modal-title-site text-center"> SEARCH </h3>
                </div>
                <div class="modal-body">
                    <!-- <div class="control-group"><a class="fb_button btn  btn-block btn-lg " href="#"> SIGNUP WITH
                        FACEBOOK </a></div>
                    <h5 style="padding:10px 0 10px 0;" class="text-center"> OR </h5> -->

                    <div class="form-group">
                        <div>
                            <input name="search" class="form-control input" size="20" placeholder="Cari produk yang diinginkan" type="text">
                        </div>
                    </div>
                    <div>
                        <div>
                            <input class="btn  btn-block btn-lg btn-primary" value="CARI" type="submit">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <p class="text-center"> Pertama kali ke sini? <a data-toggle="modal" data-dismiss="modal"
                                                                href="#ModalSignup"> Sign Up. </a> <br>
                        <a href="{{ URL::to('user/forgotPassword') }}"> Lupa password? </a></p>
                    <p class="text-center"> Punya akun? <a data-toggle="modal" data-dismiss="modal" href="#ModalLogin">
                        Login </a></p>
                </div>
            </div>
            <!-- /.modal-content -->

        </div>
        <!-- /.modal-dialog -->

    </div>
    <!-- /.ModalSignup End -->
</form>
