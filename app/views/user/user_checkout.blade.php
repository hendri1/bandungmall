@extends('user.templates.layout')

@section('content')
  <!-- CONTENT START -->
  <div class="content"> 
    
    <!--======= SUB BANNER =========-->
    <section class="sub-banner">
      <div class="container">
        <h4>SHOPPING CART</h4>
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">SHOPPING CART</li>
        </ol>
      </div>
    </section>
    
    <!--======= PAGES INNER =========-->
    <section class="section-p-30px pages-in chart-page">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="payment_steps">
          <ul class="row">
            <!-- SHOPPING CART -->
            <li class="col-sm-4"> <i class="fa fa-shopping-cart"></i>
              <h6>SHOPPING CART</h6>
            </li>
            
            <!-- CHECK OUT DETAIL -->
            <li class="col-sm-4 current"> <i class="fa fa-align-left"></i>
              <h6>CHECK OUT DETAIL</h6>
            </li>
            
            <!-- ORDER COMPLETE -->
            <li class="col-sm-4"> <i class="fa fa-check"></i>
              <h6>ORDER COMPLETE</h6>
            </li>
          </ul>
        </div>

        <!-- Payments Steps -->
        <div class="shopping-cart">

          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row">

              <div class="col-sm-7">
                <h6>BILLING INFORMATION</h6>
                <ul class="row">

                  <!-- ERROR ALAMAT -->
                  @if(!empty($error_alamat))
                    <li class="col-md-12 text-danger">* {{$error_alamat}}</li>
                  @endif

                  <li class="col-md-12">
                    @if (count($user_address) != 0)
                    <label> PILIH ALAMAT
                      <select class="selectpicker" required aria-required="true" onchange="runAddressId()" id="SelectAddress" name="SelectAddress">
                        <option value="0">Pilih Alamat Pengiriman</option>
                        @foreach($user_address as $address)    
                        <option value="{{$address->id}}">{{$address->name}}</option>
                        @endforeach
                      </select>
                    </label>
                    @else
                    <p class="lead">Silahkan masukkan alamat anda terlebih dahulu</p>
                    @endif
                  </li>

                  <!-- *BILLING ADDRESS -->
                  <li class="col-md-12">
                    <label> BILLING ADDRESS
                      <span id="billingAddress" style="color:red">* Alamat belum dipilih</span>
                    </label>
                  </li>

                </ul>

                <hr>
                <h6>COUPON INFORMATION</h6>
                <ul class="row">

                  <li class="col-md-12">
                    <label> KODE KUPON
                      <input type="text" name="code" size="10" placeholder="">
                    </label>
                  </li>

                  <li class="col-md-12">
                    <button class="btn btn-dark" id="checkCoupon" type="submit">Cek Kode</button>
                    <button class="btn btn-info" id="submitCoupon" type="submit" disabled> Pakai Kupon</button>
                  </li>

                </ul>

                <hr>
                <h6>SHIPPING INFORMATION</h6>
                <ul class="row">
                  <form class="form-inline" action="page" method="post">
                    <li>
                      <div class="checkbox" style="padding-left:10px">
                        <input id="same_as_billing" class="styled" type="radio" value="option-b1" name="add" checked>
                        <label for="same_as_billing" style="padding-left:30px"> SAME AS BILLING ADDRESS </label>
                      </div>
                    </li>
                    <li>
                      <div class="checkbox" style="padding-left:10px">
                        <input id="new_shipping" class="styled" type="radio" value="option-b2" name="add">
                        <label for="new_shipping" style="padding-left:30px"> NEW SHIPPING ADDRESS </label>
                      </div>
                    </li>
                    <li id="newShippingAddressBox">
                      <div class="form-group uppercase">
                        <a class="btn btn-dark" href="{{URL::to('user/address')}}">New shipping address</a>
                      </div>
                    </li>
                  </form>
                </ul>

                <hr>
                <h6>DELIVERY METHOD</h6>
                <ul class="row">
                  <li class="col-md-12">
                    <label> BILLING ADDRESS
                      <select class="form-control" required aria-required="true" id="SelectKurir" name="SelectKurir" onchange="changeKurir()">
                        <option value="0">Pilih Kurir</option>
                        <option value="jne">JNE</option>
                        <option value="tiki">TIKI</option>
                      </select>
                    </label>
                  </li>
                  <li class="col-md-12">
                    <label> PAKET
                      <select class="form-control" required aria-required="true" id="SelectPacket" name="SelectPacket" onchange="changePaket()">
                        <option value="0">Pilih Jenis Pengiriman</option>
                      </select>
                    </label>
                  </li>
                </ul>

                <hr>
                <h6>PAYMENT METHOD</h6>
                <ul class="row">
                  <li class="col-md-12">
                    <div class="checkbox">
                      <input id="CashOnDelivery" value="4" class="styled" type="checkbox">
                      <label for="CashOnDelivery"
                        data-toggle="collapse"
                        data-target="#CashOnDeliveryCollapse"
                        aria-expanded="false"
                        aria-controls="CashOnDeliveryCollapse">
                        Pembayaran dilakukan ke rekening <strong>BCA</strong> : no. rek : 2820105586
                        an. <strong>CV Nusantara Artifisial</strong>  
                      </label>
                    </div>
                  </li>
                  <li class="collapse" id="CashOnDeliveryCollapse">
                    <p>Transaksi dan barang akan dikirim setelah Penjual melakukan konfirmasi pembayaran anda</p>
                  </li>
                  <li class="col-md-12">
                    <div class="checkbox">
                      <input name="checkboxes" id="checkboxes-1" value="1" required type="checkbox">
                      <label for="checkboxes-1">I have read and agree to the <a href="help">Terms & Conditions</a></label>
                    </div>
                  </li>
                </ul>

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
                  <input name="transaction_total" value = "{{$finalPrice}}" type="hidden">
                  <input name="address" id="address" value="0" type="hidden">
                  <input name ="info_kurir" id="info_kurir" value="" type="hidden">
                  <input name="info_paket" id="info_paket" value="" type="hidden">
                  <input name="shipping_price" id="shipping_price" value="0" type="hidden">
                  <input name="cart_data" id="cart_data" value='{{$cart_data}}' type="hidden">
                  <button name="submit" class="btn  btn-lg btn-dark" type="submit" value="Order">ORDER</button>
                </form>
              </div>

              <!-- SUB TOTAL -->
              <div class="col-sm-5">
                <div class="order-place">
                  <h5>YOUR ORDER</h5>
                  <div class="order-detail">
                    <p>TOTAL PRODUCTS 
                      <span> 
                        @if(Session::has('cartQty'))
                        {{Session::get('cartQty')}}       
                        @else
                        0
                        @endif
                      </span>
                    </p>
                    <p>SHIPPING <span id="textKurir">Kurir</span></p>
                    <p>HARGA SBLM. DISKON <span>{{{$totalPrice,0}}}</span></p>
                    <p>TOTAL DISKON <span id="total-tax">{{{$totalDiscount,0}}}</span></p>
                    <p>KUPON <span id="info-kupon">Tidak Ada</span></p>
                    <p>POTONGAN KUPON <span id="total-kupon">0</span></p>
                    <p>TOTAL <span id="total-price">{{{$finalPrice,0}}}</span></p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
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

        $('#newShippingAddressBox').hide();
        $('input[name="add"]').on('change', function() {
          if ($('#new_shipping').is(':checked')) {
            $('#newShippingAddressBox').slideDown();
          } else {
            $('#newShippingAddressBox').slideUp();
          }
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
        var kurir = $('#SelectKurir').val();
        $('#info_kurir').val(kurir);

        $.ajax({
            url: 'checkout/getCost',
            data: 'address_id='+document.getElementById("SelectAddress").value+"&info_kurir="+kurir+"&cart_data="+$("#cart_data").val(),
            success: function(r){
                var res = "<option value='0'>Pilih Jenis Pengiriman</option>";

                for (var i = r['content'].length - 1; i >= 0; i--) {
                    if(r['content'][i]['etd'] !== ''){
                        res += "<option value='"+r['content'][i]['cost']+"'>"+r['content'][i]['service']+"</option>";
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
