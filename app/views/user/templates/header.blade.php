
<!-- Fixed navbar start -->
<!-- <meta name="viewport" content="user-scalable=0;"/> -->
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                    <div class="pull-left ">
                        <ul class="userMenu ">
                            <li><a href="{{ URL::to('help') }}"> <span class="hidden-xs">Bantuan</span><i
                                    class="glyphicon glyphicon-info-sign hide visible-xs "></i> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                    <div class="pull-right">
                        <ul class="userMenu">
                            <li class="hidden-xs"><a href="#" class="search-trigger" data-toggle="modal" data-target="#ModalSearch"><i class="fa fa-search"> </i></a></li>
                            @if (!Auth::check())
                                <li><a href="#" data-toggle="modal" data-target="#ModalLogin"> <span class="hidden-xs">Login</span>
                                    <i class="glyphicon glyphicon-log-in hide visible-xs "></i> </a></li>
                                <li class="hidden-xs"><a href="#" data-toggle="modal" data-target="#ModalSignup"> Register </a></li>
                            @else
                                <li><a href="{{ URL::to('user/myAccount') }}">{{ Auth::user()->first_name. ' ' . Auth::user()->last_name }}</a></li>
                                <li><a href="{{ URL::to('user/doLogout') }}">Logout <i class="fa fa-sign-out"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.navbar-top-->

    <div class="container" id="accordion">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                    class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span
                    class="icon-bar"> </span> <span class="icon-bar"> </span></button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"><i
                    class="fa fa-shopping-cart colorWhite"> </i> <span
                    class="cartRespons colorWhite"> Cart (
                        @if(Session::has('cartQty'))
                            {{Session::get('cartQty')}}
                        @else
                            0

                        @endif
                        ) </span></button>
            <a class="navbar-brand " href="{{ URL::to('/') }}"> <img src="{{ asset('public/assets/common/images/logo-small.jpg') }}" alt="Bandungmall.co.id"> </a>

            <!-- this part for mobile -->
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg getFullSearch" type="button" data-toggle="modal" data-target="#ModalSearch"><i class="fa fa-search"> </i></button>
                </div>
            </div>
        </div>

        <!-- this part is duplicate from cartMenu  keep it for mobile -->
        <div class="navbar-cart  collapse">
            <div class="cartMenu  col-lg-4 col-xs-12 col-md-4 ">
                <!--/.miniCartTable-->

                <div class="miniCartFooter  miniCartFooterInMobile text-right">
                    <h3 class="text-right subtotal"> 
                        @if(Session::has('cartQty'))
                            Terdapat {{Session::get('cartQty')}} barang dalam Cart
                        @else
                            Cart masih kosong
                        @endif
                         </h3>
                </div>
                <!--/.miniCartFooter-->

            </div>
            <!--/.cartMenu-->
        </div>
        <!--/.navbar-cart-->

        <style>

        </style>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown "><a data-toggle="dropdown" class="dropdown-toggle" href="#"> Wanita
                    <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        @foreach ($data_category_child as $child)
                            @if ($child->parent === 1)
                                <li><a href="{{ URL::to('product?category_id=' . $child->id) }}">{{ $child->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown "><a data-toggle="dropdown" class="dropdown-toggle" href="#"> Pria
                    <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        @foreach ($data_category_child as $child)
                            @if ($child->parent === 2)
                                <li><a href="{{ URL::to('product?category_id=' . $child->id) }}">{{ $child->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <!-- change width of megamenu = use class > megamenu-fullwidth, megamenu-60width, megamenu-40width -->
                <li class="dropdown megamenu-80width "><a data-toggle="dropdown" class="dropdown-toggle" href="#"> All Categories
                    <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content">

                            <!-- megamenu-content -->
                            @foreach ($data_category_parent as $key=>$parent)
                            <ul class="col-lg-4  col-sm-4 col-md-4  unstyled noMarginLeft">
                                <li>
                                    <p><strong>{{ $parent->name }}</strong></p>
                                </li>
                                @foreach ($data_category_child as $child)
                                    @if ($child->parent === $parent->id)
                                        <li><a href="{{ URL::to('product?category_id=' . $child->id) }}">{{ $child->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                            @endforeach
                        </li>
                    </ul>
                </li>
            </ul>

            <!--- this part will be hidden for mobile version -->
            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="dropdown  cartMenu "><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                        class="fa fa-shopping-cart"> </i> <span class="cartRespons"> Cart (
                        @if(Session::has('cartQty'))
                            {{Session::get('cartQty')}}
                        @else
                            0
                        @endif
                        ) </span> <b
                        class="caret"> </b> </a>

                    <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">

                        <div class="miniCartFooter text-right">
                            <h3 class="text-center subtotal"> <a href="{{ URL::to('/cart') }}" >
                                @if(Session::has('cartQty'))
                                    Terdapat {{Session::get('cartQty')}} barang dalam Cart<br>
                                    
                                @else
                                    Cart masih kosong
                                @endif
                            </a> </h3>
                        </div>
                        <!--/.miniCartFooter-->

                    </div>
                    <!--/.dropdown-menu-->
                </div>
                <!--/.cartMenu-->
<!-- 
                <div class="search-box">
                    <div class="input-group">
                        <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                    </div>

                </div> -->
                <!--/.search-box -->
            </div>
            <!--/.navbar-nav hidden-xs-->
        </div>
        <!--/.nav-collapse -->
        <!-- Wanita ID equals 1 -->
        <div id="collapseWanita" class="col-md-12 uppercase xlarge categoryChoice collapse">
            <table class="col-md-12" style="margin:0;">
                <tr>
                @foreach ($data_category_child as $child)
                    @if ($child->parent === 1)
                        <td bgcolor="#ebebeb" align="center"><a href="{{ URL::to('product?category_id=' . $child->id) }}"><b><font color="black">{{ $child->name }}</font></b></a></li>
                    @endif
                    
                @endforeach
                </tr>
            </table>
        </div>
        <div id="collapsePria" class="col-md-12 uppercase xlarge categoryChoice collapse">
            <table class="col-md-12" style="margin:0;">
                <tr>
                @foreach ($data_category_child as $child)
                    @if ($child->parent === 2)
                        <td bgcolor="#ebebeb" align="center"><a href="{{ URL::to('product?category_id=' . $child->id) }}"><b><font color="black">{{ $child->name }}</font></b></a></li>
                    @endif
                    
                @endforeach
                </tr>
            </table>
        </div>

    </div>
    <!--/.container -->
    
</div>
<!-- /.Fixed navbar  -->
        

<script type="text/javascript">
/*$(document).on('click', '.accordion-toggle', function(event) {
        event.stopPropagation();
        var $this = $(this);

        var parent = $this.data('parent');
        var actives = parent && $(parent).find('.collapse.in');

        // From bootstrap itself
        if (actives && actives.length) {
            hasData = actives.data('collapse');
            //if (hasData && hasData.transitioning) return;
            actives.collapse('hide');
        }

        var target = $this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, ''); //strip for ie7

        $(target).collapse('toggle');
});
$(document).ready(function(){
    $('#accordion .collapse').on('show.bs.collapse', function (e) {            
        var all = $('#accordion').find('.collapse');
        var actives = $('#accordion').find('.in, .collapsing');
        alert("Your book is overdue.");
        all.each(function (index, element) {
          $(element).collapse('hide');
        });
        actives.each(function (index, element) {                
          $(element).collapse('show');                
        });
    });
    $("#accordion").each(function() { 
        alert("Your book is overdue"); 
    });
});*/   
</script>