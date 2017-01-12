@extends('user.templates.layout')

@section('content')

  <!--======= HOME MAIN SLIDER =========-->
  <section class="home-slider">
    <div class="tp-banner-container">
      <div class="tp-banner-fix" >
        <ul>
          @foreach ($banners as $banner)
          <li data-transition="random" data-slotamount="7"> 
            <a href="{{ URL::to($banner->target_url) }}">
              <img style="width:100%" src="{{ asset($banner->image_url) }}" class="rev-slidebg" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" alt="" />
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </section>

  <!-- CONTENT START -->
  <div class="content"> 
    
    <!--======= FEATURED BRANDS =========-->
    @if (!$brands->isEmpty())
    <section class="section-p-60px our-clients">
      <div class="container"> 
        <!--  Tittle -->
        <div class="tittle animate fadeInUp" data-wow-delay="0.4s">
          <h5>FEATURED BRANDS</h5>
        </div>
        
        <!--  Client Logo Slider -->
        <div class="client-slide animate fadeInUp" data-wow-delay="0.4s">
          @foreach ($brands as $brand)
          <div class="slide" style="max-height:100px; max-width:100px;">
            <a href="{{ URL::to($brand->target_url) }}">
              <img src="{{ asset($brand->image_url) }}" alt="{{ $brand->name }}" title="{{ $brand->name }}" class="img-responsive">
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif

    <!--======= PROMOTIONS =========-->
    @if ($promotions->count() >= 4)
    <section class="section-hero white-bg" id="section-category">
      <div class="container">
        <div class="hero-section-header animate fadeInUp" data-wow-delay="0.4s">
          <h3 class="section-title style2 text-center"><span>Promotions</span></h3>
        </div>
    
        <div class="row row-centered">
       <div class="col-xs-12" style="margin: 18px 0"></div>

        <div class="block-explore col-centered col-sm-8 col-xs-8 col-xs-min-12">
          <div class="inner">
            <a href="{{ $promotions[0]->target_url }}" class="img-block"> <img alt="PROMO 1" src="{{ asset($promotions[0]->image_url) }}" class="img-responsive animate fadeInUp" data-wow-delay="0.2s" style="max-width:100%"></a>
          </div>
        </div>
        <div class="block-explore col-centered col-sm-4 col-xs-4 col-xs-min-12">
          <div class="inner">
            <a href="{{ $promotions[1]->target_url }}" class="img-block"> <img alt="PROMO 2" src="{{ asset($promotions[1]->image_url) }}" style="max-width: 100%; width:auto; overflow:hidden;" class="animate fadeInUp" data-wow-delay="0.3s"></a>

          </div>
        </div>
       <div class="col-xs-12" style="margin: 18px 0"></div>
       
        <div class="block-explore col-centered col-sm-6 col-xs-6 col-xs-min-12">
          <div class="inner">
            <a href="{{ $promotions[2]->target_url }}" class="img-block"> <img alt="PROMO 3" src="{{ asset($promotions[2]->image_url) }}" class="img-responsive animate fadeInUp" data-wow-delay="0.2s"></a>
          </div>
        </div>
        <div class="block-explore col-centered col-sm-6 col-xs-6 col-xs-min-12">
          <div class="inner">
            <a href="{{ $promotions[3]->target_url }}" class="img-block"> <img alt="PROMO 4" src="{{ asset($promotions[3]->image_url) }}" class="img-responsive animate fadeInUp" data-wow-delay="0.3s"></a>
          </div>
        </div>
       <div class="col-xs-12" style="margin: 36px 0"></div>
      </div>
    </section>
    @endif

    <!--======= PARALLAX =========-->
    <section class="parallex" data-stellar-background-ratio="0.7" style="background-image: url('{{ asset('public/assets/user/images/parallax/parallax.jpg') }}');">
      <div class="overlay">
        <div class="container">
          <h2 class="animate fadeInUp" data-wow-delay="0.2s" style="color:#fff">BANDUNGMALL</h2>
          <h2 class="animate fadeInUp" data-wow-delay="0.25s" style="color:#fff">KIBLATNYA DUNIA FASHION</h2>
          <h3 class="animate fadeInUp" data-wow-delay="0.3s" style="color:#fff"> Belanja dan dapatkan produk menarik dengan harga baik setiap hari </h3>
          <a class="btn btn-discover animate fadeInUp" data-wow-delay="0.35s" > <i class="fa fa-shopping-cart"></i> SHOP NOW </a>
        </div>
      </div>
    </section>
     
    <div style="margin: 36px 0"></div>

    <!--======= MOST POPULAR =========-->
    <section class="section-p-30px new-arrival ">
      <div class="container"> 
        
        <!--  Tittle -->
        <div class="tittle animate fadeInUp" data-wow-delay="0.4s">
          <h5>MOST POPULAR</h5>
        </div>
        <div class="popurlar_product animate fadeInUp" data-wow-delay="0.4s">
          <ul class="row">

            @forelse ($most_viewed_products as $product)
            <!--  New Arrival  -->
            <li class="col-sm-3">
              <div class="items-in"> 
                <!-- Image --> 
                <img src="{{ asset($product->image_link) }}" alt="Image"> 
                <!-- Hover Details -->
                <div class="over-item">
                  <ul class="animated fadeIn">
                    <li class="full-w"> <a href="{{ URL::to('productDetail?product_id=' . $product->id) }}" class="btn">ADD TO CART</a></li>
                  </ul>
                </div>
                <!-- Item Name -->
                <div class="details-sec"> <a href="{{ URL::to('productDetail?product_id=' . $product->id) }}">{{ $product->name }}</a> <span class="font-montserrat">Rp {{ number_format($product->price,2,',','.') }}</span> </div>
              </div>
            </li>
            @empty
              <p class="lead text-center">Belum ada produk</p>
            @endforelse

          </ul>
        </div>
      </div>
    </section>

    <!--======= NEW ARRIVAL =========-->
    <section class="section-p-30px new-arrival ">
      <div class="container"> 
        
        <!--  Tittle -->
        <div class="tittle animate fadeInUp" data-wow-delay="0.4s">
          <h5>NEW ARRIVAL</h5>
        </div>
        <div class="popurlar_product animate fadeInUp" data-wow-delay="0.4s">
          <ul class="row">

            @forelse ($products as $product)
            <!--  New Arrival  -->
            <li class="col-sm-3">
              <div class="items-in"> 
                <!-- Image --> 
                <img src="{{ asset($product->image_link) }}" alt="Image"> 
                <!-- Hover Details -->
                <div class="over-item">
                  <ul class="animated fadeIn">
                    <li class="full-w"> <a href="{{ URL::to('productDetail?product_id=' . $product->id) }}" class="btn">ADD TO CART</a></li>
                  </ul>
                </div>
                <!-- Item Name -->
                <div class="details-sec"> <a href="{{ URL::to('productDetail?product_id=' . $product->id) }}">{{ $product->name }}</a> <span class="font-montserrat">Rp {{ number_format($product->price,2,',','.') }}</span> </div>
              </div>
            </li>
            @empty
              <p class="lead text-center">Belum ada produk</p>
            @endforelse

          </ul>
        </div>
      </div>
    </section>

  </div>

@endsection


@section('javascript')
<!-- include custom script for only homepage  -->
<script src="{{ asset('public/assets/user/js/home.js') }}"></script>

<script type="text/javascript">

$("#owl-brand").owlCarousel({ 
        items:10,   
        itemsDesktop : [1199,10],
        itemsDesktopSmall : [980,9],
        itemsTablet: [768,5],
        itemsTabletSmall: false,
        itemsMobile : [479,4]
});
</script>

@endsection
