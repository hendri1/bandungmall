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
            <li class="col-sm-4 current"> <i class="fa fa-shopping-cart"></i>
              <h6>SHOPPING CART</h6>
            </li>
            
            <!-- CHECK OUT DETAIL -->
            <li class="col-sm-4"> <i class="fa fa-align-left"></i>
              <h6>CHECK OUT DETAIL</h6>
            </li>
            
            <!-- ORDER COMPLETE -->
            <li class="col-sm-4"> <i class="fa fa-check"></i>
              <h6>ORDER COMPLETE</h6>
            </li>
          </ul>
        </div>
        
        <!-- Payments Steps -->
        <div class="shopping-cart text-center">
          <div class="cart-head">
            <ul class="row">
              <!-- PRODUCTS -->
              <li class="col-sm-3">
                <h6>PRODUCTS</h6>
              </li>
              <!-- DETAILS -->
              <li class="col-sm-3">
                <h6>DETAILS</h6>
              </li>
              <!-- QNT -->
              <li class="col-sm-1">
                <h6>QNT</h6>
              </li>
              <!-- DISCOUNT -->
              <li class="col-sm-2">
                <h6>DISCOUNT</h6>
              </li>
              <!-- TOTAL PRICE -->
              <li class="col-sm-2">
                <h6>TOTAL PRICE</h6>
              </li>
              <li class="col-sm-1"> </li>
            </ul>
          </div>

          <?php
            $totalPrice = 0;
            $totalDiscount = 0;
            $finalPrice = 0;
          ?>
          
          @if (is_array($cart_data) || is_object($cart_data))
          @foreach($cart_data as $product_in_cart)
          <!-- Cart Details -->
          <ul class="row cart-details">
            <li class="col-sm-6">
              <div class="media"> 
                <!-- Media Image -->
                <div class="media-left media-middle"> <a href="productDetail?product_id={{$product_in_cart->id}}" class="item-img"> <img class="media-object" src="{{$product_in_cart->image_link}}" alt=""> </a> </div>
                
                <!-- Item Name -->
                <div class="media-body">
                  <div class="position-center-center">
                    <h6>{{$product_in_cart->name}}</h6>
                    <div class="price"><span>{{$product_in_cart->price}}</span></div>
                  </div>
                </div>
              </div>
            </li>
            
            <!-- QTY -->
            <li class="col-sm-1">
              <div class="position-center-center">
                <h6>{{$cart[$product_in_cart->id]}}</h6>
              </div>
            </li>
            
            <!-- DISCOUNT -->
            <li class="col-sm-2">
              <div class="position-center-center"> 
                <span> 
                @if( $product_in_cart->discount_date_start >= date("Y-m-d") && $product_in_cart->discount_date_end <= date("Y-m-d") && $product_in_cart->discount > 0)
                {{$product_in_cart->discount}}%
                @else
                0%
                @endif
                </span>
              </div>
            </li>
            <!-- TOTAL PRICE -->
            <li class="col-sm-2">
              <div class="position-center-center"> 
                <span><?php
                  $totalPrice = $totalPrice + $product_in_cart->price * $cart[$product_in_cart->id];
                  if( $product_in_cart->discount_date_start >= date("Y-m-d") && $product_in_cart->discount_date_end <= date("Y-m-d") && $product_in_cart->discount > 0){ 
                      
                      $totalDiscount = $totalDiscount + ($product_in_cart->discount/100) * $product_in_cart->price * $cart[$product_in_cart->id];
                      $priceNow = (100 - $product_in_cart->discount) * $product_in_cart->price / 100 ;
                      
                  } else {
                      $priceNow = $product_in_cart->price;

                  }
                  $finalPrice = $finalPrice + $priceNow * $cart[$product_in_cart->id];
                  echo $priceNow * $cart[$product_in_cart->id]
                ?></span> 
              </div>
            </li>
            
            <!-- EDIT AND REMOVE -->
            <li class="col-sm-1">
              <div class="position-center-center"><a href="cart/delete?product_id={{$product_in_cart->id}}"><i class="fa fa-trash"></i></a> </div>
            </li>
          </ul>
          @endforeach
          @else
            <p><span class="price">Belum terdapat produk silahkan pilih produk yang anda inginkan</span></p>
          @endif

          <!-- BTN INFO -->
          <div class="btn-sec"> 
            <!-- UPDATE SHOPPING CART --> 
            <a href="{{URL::to('/cart/refresh')}}" class="btn btn-dark"> <i class="fa fa-arrow-circle-o-up"></i> UPDATE SHOPPING CART </a> 
            <!-- CONTINUE SHOPPING --> 
            <a href="{{URL::to('/')}}" class="btn btn-dark right-btn"> <i class="fa fa-shopping-cart"></i> CONTINUE SHOPPING </a>
          </div>

          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-8">
                <h6>SUMMARY</h6>
                <div>
                  <table class="table">
                    <tr>
                      <th>TOTAL PRODUCTS</th>
                      <td> 
                        @if(Session::has('cartQty'))
                          {{Session::get('cartQty')}}       
                        @else
                          0
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Shipping</td>
                      <td>Tarif JNE</td>
                    </tr>
                    <tr>
                      <td>Harga sebelum diskon</td>
                      <td>{{$totalPrice}}</td>
                    </tr>
                    <tr>
                      <td>Total Diskon</td>
                      <td>{{$totalDiscount}}</td>
                    </tr>
                  </table>
                </div>
              </div>
              
              <!-- SUB TOTAL -->
              <div class="col-sm-4">
                <div class="grand-total"> <span>SUB TOTAL: {{$totalPrice}}</span>
                  <h4>GRAND: <span> {{$finalPrice}} </span></h4>
                  @if(Auth::check())
                    @if(!empty($user_address) && is_array($cart_data) || is_object($cart_data))
                      <a class="btn" title="checkout" href="{{URL::to('/checkout')}}"> Proceed to checkout &nbsp; <i class="fa fa-arrow-right"></i> </a>
                    @else
                    <a class="btn" title="checkout" href="{{URL::to('/user/address')}}"> Masukkan alamat / pilih barang terlebih dahulu <i class="fa fa-arrow-right"></i> </a>
                    @endif
                  @endif
                  <p>Checkout with Current Address</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
@endsection