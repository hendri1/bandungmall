@extends('user.templates.layout')

@section('content')
<style>
	body {
		margin-top: -190px;
	}
</style>

<div class="full-container headerOffset">

  @include('user.home.banner')


  <!-- Featured Brands start -->
  @if (!$brands->isEmpty())
  <div class="w100 sectionCategory">
    <div class="container">
      <div class="sectionCategoryIntro text-center">
        <h1>
          <a id="prevBrand" class="link carousel-nav">
            <i class="fa fa-angle-left"></i>
          </a>
          Featured Brands
          <a id="nextBrand" class="link carousel-nav">
            <i class="fa fa-angle-right"></i>
          </a>
        </h1>
      </div>
      <div class="width100 section-block">
        <div class="row">
          <div class="col-lg-12">
            <div class="no-margin brand-carousel owl-carousel owl-theme" id="owl-brand">
              @foreach ($brands as $brand)
              <div style="max-height:100px; max-width:100px;">
                <a href="{{ URL::to($brand->target_url) }}">
                  <img src="{{ asset($brand->image_url) }}" alt="{{ $brand->name }}" title="{{ $brand->name }}" class="img-responsive  center-block">
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="white-bg gap"></div>
  @if ($promotions->count() >= 4)
  <section class="section-hero white-bg" id="section-category">
    <div class="container">
      <div class="hero-section-header ">
        <h3 class="section-title style2 text-center"><span>Promotions</span></h3>
      </div>
  <div class="white-bg gap"></div>
      <div class="row row-centered">

      <div class="block-explore col-centered col-sm-8 col-xs-8 col-xs-min-12">
        <div class="inner">
          <a href="{{ $promotions[0]->target_url }}" class="img-block"> <img alt="PROMO 1" src="{{ asset($promotions[0]->image_url) }}" class="img-responsive" style="max-width:100%"></a>
        </div>
      </div>
      <div class="block-explore col-centered col-sm-4 col-xs-4 col-xs-min-12">
        <div class="inner">
          <a href="{{ $promotions[1]->target_url }}" class="img-block"> <img alt="PROMO 2" src="{{ asset($promotions[1]->image_url) }}" style="max-width: 100%; width:auto; overflow:hidden;"></a>

        </div>
      </div>
	   <div class="white-bg gap"></div>
	   
      <div class="block-explore col-centered col-sm-6 col-xs-6 col-xs-min-12">
        <div class="inner">
          <a href="{{ $promotions[2]->target_url }}" class="img-block"> <img alt="PROMO 3" src="{{ asset($promotions[2]->image_url) }}" class="img-responsive"></a>
        </div>
      </div>
      <div class="block-explore col-centered col-sm-6 col-xs-6 col-xs-min-12">
        <div class="inner">
          <a href="{{ $promotions[3]->target_url }}" class="img-block"> <img alt="PROMO 4" src="{{ asset($promotions[3]->image_url) }}" class="img-responsive"></a>
        </div>
      </div>
    </div>
  </section>
  @endif
  
    <div class="white-bg gap"></div>

  <div class="parallax-section parallax-image-1" style="background: url('{{ asset('public/assets/user/images/parallax/parallax.jpg') }}');">
      <div class="container">
          <div class="row ">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="parallax-content clearfix">
                      <h2 class="parallaxPrce"> BANDUNGMALL </h2>

                      <h2 class="uppercase">KIBLATNYA DUNIA FASHION</h2><br>

                      <h3> Belanja dan dapatkan produk menarik dengan harga baik setiap hari </h3>

                      <div style="clear:both"></div>
                      <a class="btn btn-discover "> <i class="fa fa-shopping-cart"></i> SHOP NOW </a></div>
              </div>
          </div>
      </div>
  </div>

  <style>
    .description, .item h4, .description p {
      min-height: 0;
    }
    .item h4 {
      margin-top: 10px;
    }
    .description p {
      margin-bottom: 10px;
    }
  </style>

    <div class="white-bg gap"></div>
	
  <section class="section-hero white-bg" id="section-category">
    <div class="container">
      <div class="hero-section-header ">
        <h3 class="section-title style2 text-center"><span>Most Popular</span></h3>
      </div>

	    <div class="white-bg gap"></div>
		
      <div class="section-content">
        <div class="row has-equal-height-child">

          @forelse ($most_viewed_products as $product)
            <div class="item col-lg-3 col-md-3 col-sm-6 col-xs-6">
				<div class="product">
					<div class="image">						
						<a href="{{ URL::to('productDetail?product_id=' . $product->id) }}">
                          <img src="{{ asset($product->image_link) }}" alt="img" class="img-responsive">
                        </a>
					</div>
					<div class="description">
                            <h4><a href="{{ URL::to('productDetail?product_id=' . $product->id) }}"> {{ $product->name }} </a></h4>
                            <span class="size"> </span></div>
					<p class="text-center">Rp {{ number_format($product->price,2,',','.') }}</p>
					<div class="action-control"><a class="btn btn-primary" href="{{ URL::to('productDetail?product_id=' . $product->id) }}"> <span class="add2cart"><i
							class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
				</div>
			</div>
			<!--/.item-->
          @empty
            <p class="lead text-center">Belum ada produk</p>
          @endforelse
        </div>
      </div>
    </div>
  </section>
  
  <section class="section-hero white-bg" id="section-category">
    <div class="container">
      <div class="hero-section-header ">
        <h3 class="section-title style2 text-center"><span>New Arrival</span></h3>
      </div>

	  <div class="white-bg gap"></div>
	  
      <div class="section-content">
        <div class="row has-equal-height-child">

          @forelse ($products as $product)
			
			<div class="item col-lg-3 col-md-3 col-sm-6 col-xs-6">
				<div class="product">
					<div class="image">						
						<a href="{{ URL::to('productDetail?product_id=' . $product->id) }}">
                          <img src="{{ asset($product->image_link) }}" alt="img" class="img-responsive">
                        </a>
					</div>
					<div class="description">
                            <h4><a href="{{ URL::to('productDetail?product_id=' . $product->id) }}"> {{ $product->name }} </a></h4>
                            <span class="size"> </span></div>
					<p class="text-center">Rp {{ number_format($product->price,2,',','.') }}</p>
					<div class="action-control"><a class="btn btn-primary" href="{{ URL::to('productDetail?product_id=' . $product->id) }}"> <span class="add2cart"><i
							class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
				</div>
			</div>
			<!--/.item-->
          @empty
            <p class="lead text-center">Belum ada produk</p>
          @endforelse
        </div>
      </div>
    </div>
  </section>
  
  <div
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
