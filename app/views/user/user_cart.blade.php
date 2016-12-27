@extends('user.templates.layout')

@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
            <h1 class="section-title-inner"><span><i
                    class="glyphicon glyphicon-shopping-cart"></i> Shopping cart </span></h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
            <h4 class="caps"><a href="{{URL::to('home')}}"><i class="fa fa-chevron-left"></i> Back to shopping </a></h4>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="cartContent w100">
                        <table class="cartTable table-responsive" style="width:100%">
                            <tbody>

                            <tr class="CartProduct cartTableHeader">
                                <td style="width:15%"> Product</td>
                                <td style="width:40%">Details</td>
                                <td style="width:10%" class="delete">&nbsp;</td>
                                <td style="width:10%">QNT</td>
                                <td style="width:10%">Discount</td>
                                <td style="width:15%">Total</td>
                            </tr>
                            <?php
                                $totalPrice = 0;
                                $totalDiscount = 0;
                                $finalPrice = 0;
                            ?>
                            @if (is_array($cart_data) || is_object($cart_data))
                            @foreach($cart_data as $product_in_cart)
                            
                            <tr class="CartProduct">
                                <td class="CartProductThumb">
                                    <div><a href="productDetail?product_id={{$product_in_cart->id}}"><img src="{{$product_in_cart->image_link}}" alt="img"></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="CartDescription">
                                        <h4><a href="productDetail?product_id={{$product_in_cart->id}}">{{$product_in_cart->name}} </a></h4>

                                        <div class="price"><span>{{$product_in_cart->price}}</span></div>
                                    </div>
                                </td>
                                <td class="delete"><a title="Delete" href="cart/delete?product_id={{$product_in_cart->id}}"> <i
                                        class="glyphicon glyphicon-trash fa-2x"></i></a></td>
                                <td>{{$cart[$product_in_cart->id]}}</td>
                                <td>
                                    @if( $product_in_cart->discount_date_start >= date("Y-m-d") && $product_in_cart->discount_date_end <= date("Y-m-d") && $product_in_cart->discount > 0)
                                    {{$product_in_cart->discount}}%
                                    @else
                                    0%
                                    @endif
                                </td>
                                <td class="price">
                                    <?php
                                        $totalPrice = $totalPrice + $product_in_cart->price * $cart[$product_in_cart->id];
                                        if( $product_in_cart->discount_date_start >= date("Y-m-d") && $product_in_cart->discount_date_end <= date("Y-m-d") && $product_in_cart->discount > 0){ 
                                            
                                            $totalDiscount = $totalDiscount + ($product_in_cart->discount/100) * $product_in_cart->price * $cart[$product_in_cart->id];
                                            $priceNow = (100 - $product_in_cart->discount) * $product_in_cart->price / 100 ;
                                            
                                        } else {
                                            $priceNow = $product_in_cart->price;

                                        }
                                        $finalPrice = $finalPrice + $priceNow * $cart[$product_in_cart->id];
                                        echo $priceNow * $cart[$product_in_cart->id]?>
                                    </td>
                            </tr>
                            @endforeach
                            @else
                               <td colspan ="5" > <span class="price">Belum terdapat produk silahkan pilih produk yang anda inginkan</span> </td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!--cartContent-->

                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left"><a href="{{URL::to('/')}}" class="btn btn-default"> <i
                                    class="fa fa-arrow-left"></i> &nbsp; Continue shopping </a></div>
                            <div class="pull-right">
                                <a href ="{{URL::to('/cart/refresh')}}" class="btn btn-default"> &nbsp; Update cart</a>
                            </div>
                        </div>
                    </div>
                    <!--/ cartFooter -->

                </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
            <div class="contentBox">
                <div class="w100 costDetails">
                    <div class="table-block" id="order-detail-content">
                        @if(Auth::check())
                            @if(!empty($user_address) && is_array($cart_data) || is_object($cart_data))
                            <a class="btn btn-primary btn-lg btn-block " title="checkout" href="{{URL::to('/checkout')}}"
                            style="margin-bottom:20px"> Proceed to checkout &nbsp; <i class="fa fa-arrow-right"></i> </a>
                            @else
                            <a class="btn btn-primary btn-lg btn-block " title="checkout" href="{{URL::to('/user/address')}}"
                            style="margin-bottom:20px"> Masukkan alamat / pilih barang <br> terlebih dahulu &nbsp; <i class="fa fa-arrow-right"></i> </a>
                            @endif
                        @endif

                        <div class="w100 cartMiniTable">
                            <table id="cart-summary" class="std table">
                                <tbody>
                                <tr>
                                    <td>Total products</td>
                                    <td class="price">
                                        @if(Session::has('cartQty'))
                                            {{Session::get('cartQty')}}       
                                        @else
                                            0
                                        @endif</td>
                                </tr>
                                <tr style="">
                                    <td>Shipping</td>
                                    <td class="price"><span class="success">Tarif JNE</span></td>
                                </tr>
                                <tr class="cart-total-price ">
                                    <td>Harga sebelum diskon</td>
                                    <td class="price">{{$totalPrice}}</td>
                                </tr>
                                <tr>
                                    <td>Total Diskon</td>
                                    <td class="price" id="total-tax">{{$totalDiscount}}</td>
                                </tr>
                                <tr>
                                    <td> Total</td>
                                    <td class=" site-color" id="total-price">{{$finalPrice}}</td>
                                </tr>
                                
                                </tbody>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End popular -->

        </div>
        <!--/rightSidebar-->

    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /.main-container -->

<div class="gap"></div>
@endsection