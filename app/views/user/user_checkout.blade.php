@extends('user.templates.layout')

@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/cart')}}">Cart</a></li>
                <li class="active"> Checkout</li>
            </ul>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i
                        class="glyphicon glyphicon-shopping-cart"></i>CHECKOUT</span></h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
            <h4 class="caps"><a href="{{URL::to('/')}}"><i class="fa fa-chevron-left"></i> Back to shopping </a></h4>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">


                    <div class="w100 clearfix">
                        <div class="row userInfo">

                            <div style="clear: both"></div>

                            <div class="onepage-checkout col-lg-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                   href="#BillingInformation" aria-expanded="true"
                                                   aria-controls="BillingInformation">
                                                    Billing information
                                                    @if(!empty($error_alamat))
                                                        <span style="margin-left:10px; color:red">* {{$error_alamat}}</span>
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="BillingInformation" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="BillingInformation">
                                            <div class="panel-body">
                                                <div style="clear: both"></div>

                                                <div id="exisitingAddressBox" class="collapse in">
                                                    <div class="form-group uppercase">
                                                        <strong>Pilih Billing address</strong>
                                                    </div>
                                                    <form>
                                                        <div class="form-group required maxwidth300">
                                                            <label for="InputCountry">
                                                                Pilih Alamat <sup>*</sup>
                                                            </label>
                                                            @if (count($user_address) != 0)
                                                            <select class="form-control" required aria-required="true" onchange="runAddressId()"
                                                                    id="SelectAddress" name="SelectAddress">
                                                                <option value="0">Pilih Alamat Pengiriman</option>
                                                                @foreach($user_address as $address)    
                                                                <option value="{{$address->id}}">{{$address->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @else
                                                            Silahkan masukkan alamat anda terlebih dahulu
                                                            @endif
                                                        </div>
                                                    </form>
                                                    <div class="form-group">
                                                        <strong class="uppercase">Billing address</strong><br>
                                                        <span id="billingAddress" style="color:red">* Alamat belum dipilih</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                   data-parent="#accordion" href="#Couponinformation"
                                                   aria-expanded="false" aria-controls="collapseTwo">
                                                    Coupon information
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="Couponinformation" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="Couponinformation">
                                            <div class="panel-body">
                                                <div id="kurir"
                                                         class="form-group  col-lg-4 col-sm-4 col-md-4 -col-xs-12">
                                                        <label for="id-state">Kode Kupon</label>&nbsp;&nbsp;&nbsp;
                                                        <label style="color:red" class="checkKupon"></label>
                                                        <input class="form-control" size="10" id="couponCode" type="text"
                                                              placeholder="Masukkan Kode Kupon" name="code"> 
                                                        <input class="btn  btn-lg btn-primary" id="checkCoupon" type="submit"
                                                              value="Cek Kode">
                                                        <input class="btn  btn-lg btn-info" id="submitCoupon" type="submit"
                                                              value="Pakai Kupon" disabled> 
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                   data-parent="#accordion" href="#Shippinginformation"
                                                   aria-expanded="false" aria-controls="collapseTwo">
                                                    Shipping information
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="Shippinginformation" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="Shippinginformation">
                                            <div class="panel-body">

                                                <form class="form-inline" action="page" method="post">
                                                    <label class="radio inline">
                                                        <input id="existingShippingAddress" type="radio"
                                                               value="option-b1" name="add" checked="checked"> Same as
                                                        Billing address
                                                    </label>&nbsp;&nbsp;
                                                    <label class="radio inline">
                                                        <input id="newShippingAddress" type="radio" value="option-b2"
                                                               name="add"> New Shipping
                                                        address
                                                    </label>
                                                </form>
                                                <hr>
                                                <div style="clear: both"></div>

                                                <div class="expandBox collapse" id="newShippingAddressBox">
                                                    <div class="form-group uppercase">
                                                        <a href="{{URL::to('user/address')}}"><strong>new shipping address</strong></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                   data-parent="#accordion" href="#Deliverymethod" aria-expanded="false"
                                                   aria-controls="Deliverymethod">
                                                    Delivery method
                                                    @if(!empty($error_kurir))
                                                        <span style="margin-left:10px; color:red">* {{$error_kurir}}</span>
                                                    @endif
                                                    @if(!empty($error_paket))
                                                        <span style="margin-left:10px; color:red">* {{$error_paket}}</span>
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="Deliverymethod" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="Deliverymethod">
                                            <div class="panel-body">
                                                <div class="w100 row">
                                                    <div id="kurir"
                                                         class="form-group  col-lg-4 col-sm-4 col-md-4 -col-xs-12">
                                                        <label for="id-state">Kurir yang diinginkan</label>
                                                        <select class="form-control" required aria-required="true"
                                                                id="SelectKurir" name="SelectKurir" onchange="changeKurir()">
                                                            <option value="0">Pilih Kurir</option>
                                                            <option value="jne">JNE</option>
                                                            <option value="tiki">TIKI</option>
                                                        </select>
                                                        <label for="id-state">Paket:</label>
                                                        <select class="form-control" required aria-required="true"
                                                                id="SelectPacket" name="SelectPacket" onchange="changePaket()">
                                                            <option value="0">Pilih Jenis Pengiriman</option>
                                                            <!-- <option value="biasa">Biasa</option>
                                                            <option value="kilat">Kilat</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                   data-parent="#accordion" href="#Paymentmethod" aria-expanded="false"
                                                   aria-controls="Paymentmethod">
                                                    Payment method
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="Paymentmethod" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="Paymentmethod">
                                            <div class="panel-body">


                                                <div class="onepage-payment">


                                                    <div class="card-paynemt-box payment-method">


                                                        <label class="radio-inline" for="CashOnDelivery"
                                                               data-toggle="collapse"
                                                               data-target="#CashOnDeliveryCollapse"
                                                               aria-expanded="false"
                                                               aria-controls="CashOnDeliveryCollapse">
                                                            <input name="radios" id="CashOnDelivery" value="4"
                                                                   type="radio">
                                                            Pembayaran dilakukan ke rekening <strong>BCA</strong> : no. rek : 2820105586
                                                            an. <strong>CV Nusantara Artifisial</strong>  </label>

                                                        <div class="collapse" id="CashOnDeliveryCollapse">

                                                            <p>Transaksi dan barang akan dikirim setelah Penjual melakukan konfirmasi pembayaran anda</p>

                                                        </div>

                                                    </div>


                                                    <form action="{{URL::to('/checkout/doCheckoutFinal')}}" method="post">
                                                        <?php $totalPrice = 0;
                                                        $totalDiscount = 0;
                                                        $finalPrice = 0; ?>
                                                        @if (is_array($cart_data) || is_object($cart_data))
                                                        @foreach($cart_data as $product_in_cart)
                                                        <?php
                                                        $totalPrice = $totalPrice + $product_in_cart->price * $cart[$product_in_cart->id];
                                                        if ($product_in_cart->discount_date_start >= date("Y-m-d") && $product_in_cart->discount_date_end <= date("Y-m-d") && $product_in_cart->discount > 0) {

                                                            $totalDiscount = $totalDiscount + ($product_in_cart->discount / 100) * $product_in_cart->price * $cart[$product_in_cart->id];
                                                            $priceNow = (100 - $product_in_cart->discount) * $product_in_cart->price / 100;
                                                        } else {
                                                            $priceNow = $product_in_cart->price;
                                                        }
                                                        $finalPrice = $finalPrice + $priceNow * $cart[$product_in_cart->id];
                                                        ?>
                                                        @endforeach
                                                        @endif
                                                        <div class="form-group clearfix">
                                                            <br>
                                                            <label class="checkbox-inline" for="checkboxes-1">
                                                                <input name="checkboxes" id="checkboxes-1" value="1" required
                                                                       type="checkbox">
                                                                I have read and agree to the <a
                                                                    href="help">Terms & Conditions</a>
                                                            </label>
                                                        </div>
                                                        <input name="transaction_total" value = "{{$finalPrice}}" type="hidden">
                                                        <input name="address" id="address" value="0" type="hidden">
                                                        <input name ="info_kurir" id = "info_kurir" value="" type="hidden">
                                                        <input name="info_paket" id="info_paket" value="" type="hidden">
                                                        <input name="shipping_price" id="shipping_price" value="0" type="hidden">
                                                        <input name="cart_data" id="cart_data" value='{{$cart_data}}' type="hidden">
                                                        <div class="pull-left"><input name="submit" class="btn  btn-lg btn-primary" type="submit" value="Order"> </div>
                                                    </form>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!--onepage-checkout-->


                        </div>
                        <!--/row end-->

                    </div>


                </div>
            </div>
            <!--/row end-->

        </div>

        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
            <div class="contentBox">
                <div class="w100 costDetails">

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
                                    <td class="price"><span class="success" id="textKurir">Kurir</span></td>
                                </tr>
                                <tr class="cart-total-price ">
                                    <td>Harga sebelum diskon</td>
                                    <td class="price">{{{$totalPrice,0}}}</td>
                                </tr>
                                <tr>
                                    <td>Total Diskon</td>
                                    <td class="price" id="total-tax">{{{$totalDiscount,0}}}</td>
                                </tr>
                                <tr>
                                    <td>Kupon</td>
                                    <td class="coupon" id="info-kupon">tidak ada kupon</td>
                                </tr>
                                <tr>
                                    <td>Potongan Kupon</td>
                                    <td class="coupon-tax" id="total-kupon">0</td>
                                </tr>
                                <tr>
                                    <td> Total</td>
                                    <td class=" site-color" id="total-price">{{{$finalPrice,0}}}</td>
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
<!-- /.main-container-->
<div class="gap"></div>
@endsection

@section ('javascript')


<script>


    $(document).ready(function () {
    
    	$('#checkCoupon').on('click',function(event){
            var coupon_code = $("#couponCode").val();
            $.ajax({
                data: 'coupon_code='+coupon_code,
                url: "checkout/checkCoupon", 
                success: function(result){
                    $('.checkKupon').html(result['message']);
                    if(result['message'] == "* Kupon tersedia"){
                        $('#submitCoupon').attr('disabled',false);
                    }else{
                        $('#submitCoupon').attr('disabled',true);
                    }
                }
            });
        });

        $('#submitCoupon').on('click',function(event){
            var coupon_code = $("#couponCode").val();
            var total = $('#total-price').html();
            $.ajax({
                data: 'coupon_code='+coupon_code,
                url: "checkout/setCoupon", 
                success: function(result){
                    $('.coupon').html(result[0]['kode_coupon']);
                    $('.coupon-tax').html(result[0]['potongan']);
                    total = total - result[0]['potongan'];
                    $('#total-price').html(total);
                    $('input[name=coupon_id]').val(result[0]['id']);
                    $('input[name=transaction_total]').val(total);
                    $('.checkKupon').html('* Kupon terpakai');
                }
            });
        });

        $('input#newAddress').on('ifChanged', function (event) {
            //alert(event.type + ' callback');
            $('#newBillingAddressBox').collapse("show");
            $('#exisitingAddressBox').collapse("hide");

        });

        $('input#exisitingAddress').on('ifChanged', function (event) {
            //alert(event.type + ' callback');
            $('#newBillingAddressBox').collapse("hide");
            $('#exisitingAddressBox').collapse("show");
        });


        $('input#newShippingAddress').on('ifChanged', function (event) {
            //alert(event.type + ' callback');
            $('#newShippingAddressBox').collapse("show");

        });

        $('input#existingShippingAddress').on('ifChanged', function (event) {
            //alert(event.type + ' callback');
            $('#newShippingAddressBox').collapse("hide");

        });


        $('input#creditCard').on('ifChanged', function (event) {
            //alert(event.type + ' callback');
            $('#creditCardCollapse').collapse("toggle");

        });


        $('input#CashOnDelivery').on('ifChanged', function (event) {
            //alert(event.type + ' callback');
            $('#CashOnDeliveryCollapse').collapse("toggle");

        });


    });
    function runAddressId() {
        document.getElementById("address").value = document.getElementById("SelectAddress").value;
        $.ajax({
            url: 'checkout/getAddress',
            data: 'id='+document.getElementById("SelectAddress").value,
            success: function(r){
                if(r.id){
                    var res = "<p style='margin:0'>Provinsi <pre>"+r.district+"</pre></p>"+
                    "<p style='margin:0'>Kota <pre>"+r.city+"</pre></p>"+
                    "<p style='margin:0'>Alamat <pre>"+r.address+"</pre></p>"+
                    "<p style='margin:0'>Kode Pos <pre>"+r.postal_code+"</pre></p>"+
                    "<p style='margin:0'>No Hp <pre>"+r.phone_number+"</pre></p>";
                    $("#billingAddress").attr("style","color:black");
                    $("#billingAddress").html(res);
                }else{
                    $("#billingAddress").attr("style","color:red");
                    $("#billingAddress").html("* Alamat belum dipilih");
                }
            }
        });
    }

    function changeKurir() {
        document.getElementById("info_kurir").value = document.getElementById("SelectKurir").value;

        $.ajax({
            url: 'checkout/getCost',
            data: 'address_id='+document.getElementById("SelectAddress").value+"&info_kurir="+document.getElementById("SelectKurir").value+"&cart_data="+$("#cart_data").val(),
            success: function(r){
                var x;
                var res = "<option value='0'>Pilih Jenis Pengiriman</option>";

                for (var i = r['content'].length - 1; i >= 0; i--) {
                    if(r['content'][i]['etd'] !== ''){
                        res += "<option value='"+r['content'][i]['cost']+"'>"+r['content'][i]['service']+"";
                    }
                }
                $("#SelectPacket").html(res);
            }
        });
    }

    function changePaket() {
        document.getElementById("info_paket").value = $("#SelectPacket option:selected").text();
        document.getElementById("textKurir").innerHTML = document.getElementById("SelectKurir").value +" : " + document.getElementById("SelectPacket").value;
        document.getElementById("shipping_price").value = document.getElementById("SelectPacket").value;

        var total = parseInt($('#total-price').html());
        total = total + parseInt($('#SelectPacket').val());

        $("input[name=transaction_total]").val(total);
        $("#total-price").html(total);
    }

</script>
@endsection
