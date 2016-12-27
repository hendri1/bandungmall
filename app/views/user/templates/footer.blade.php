
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> My Account </h3>
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#ModalLogin"> <span>Sign In</span>
                            </a></li>
                        <li><a href="#" data-toggle="modal" data-target="#ModalSignup"> Register </a></li>
                    </ul>
                </div>
                    <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                        <h3> About </h3>
                        <ul>
                            <li><a href="{{ URL::to('/help') }}">About Bandungmall</a></li>
                            <li><a href="{{ URL::to('/help#2') }}">Press</a></li>
                            <li><a href="{{ URL::to('/help#4') }}">Policy</a></li>
                            <li><a href="{{ URL::to('/help#3') }}">Terms and Conditions</a></li>
                            <li><a href="{{ URL::to('/merchant/register') }}">Join as Merchant</a></li>
                            <li><a href="{{ URL::to('/merchant/login') }}">Merchant Area</a></li>
                        </ul>
                    </div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> Customer Service </h3>
                    <ul>
                        <li><a href="tel:+6285624222399"><i class="fa fa-phone"></i> +6285624222399 </a></li>
                        <li><a href="mailto:support@bandungmall.co.id"><i class="fa fa-envelope"></i> support@bandungmall.co.id</a></li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Help </h3>
                    <ul>
                        <li><a href="{{ URL::to('/help#help5') }}">Shopping Guide</a></li>
                        <li><a href="{{ URL::to('/help#help3') }}">Private Shopping</a></li>
                        <li><a href="{{ URL::to('/help#help1') }}">Payment Guide</a></li>
                        <li><a href="{{ URL::to('/help') }}">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> &copy; <a href="{{ URL::to('/') }}">Bandungmall.co.id</a> 2016. All right reserved. </p>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>
