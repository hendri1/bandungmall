@extends('user.templates.layout')

@section('content')
<!-- /.Fixed navbar  -->
<style>
	.headerOffset {
		padding-top: 100px;
	}
</style>

  <!-- CONTENT START -->
  <div class="content"> 
    
    <!--======= SUB BANNER =========-->
    <section class="sub-banner animate fadeInUp" data-wow-delay="0.4s">
      <div class="container">
        <h4>KOLEKSI {{ strtoupper($category_parent->name) }}</h4>
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">
            @if(isset($category))
              {{$category->name}}
            @else
              SEARCH
            @endif
            @if(isset($category_parent)){{$category_parent->name}}@endif
          </li>
        </ol>
      </div>
    </section>

    <!--======= PAGES INNER =========-->
    <section class="section-p-30px pages-in">
      <div class="container">
        <div class="row"> 

          @include('user.left_navbar')

          <!--======= ITEMS =========-->
          <div class="col-sm-9 animate fadeInUp" data-wow-delay="0.2s">
            <div class="items-short-type animate fadeInUp" data-wow-delay="0.4s"> 
              
              <!--======= GRID LIST STYLE =========-->
              <div class="grid-list"> <a href="#."><i class="fa fa-th-large"></i></a> <a href="#."><i class="fa fa-th-list"></i></a> </div>
              
              <!--======= SHOWING =========-->
              <div class="short-by">
                <p>Showing {{$products-> count()}} products</p>
              </div>
            </div>

            <!--======= Products =========-->
            <div class="popurlar_product">
              @if($products->isEmpty())
              <div class="w100 productFilter clearfix">
                <h2>Tidak ada produk ditemukan</h2>
              </div>
              @else
              <ul class="row">
                
                @foreach ($products as $product)
                <!-- New Products -->
                <li class="col-sm-4 animate fadeIn" data-wow-delay="0.4s">
                  <div class="items-in"> 
                    
                    @if($product->discount > 0 && strtotime(date('Y-m-d')) >= strtotime($product->discount_date_start)  && strtotime(date('Y-m-d')) <= strtotime($product->discount_date_end))
                    <div class="hot-tag">{{$product->discount}}% OFF</div>
                    @endif

                    <!-- Image --> 
                    <img src="{{$product->image_link }}" alt=""> 
                    <!-- Hover Details -->
                    <div class="over-item">
                      <ul class="animated fadeIn">
                        <li class="full-w"> <a href="productDetail?product_id={{$product->id}}" class="btn">ADD TO CART</a></li>
                      </ul>
                    </div>
                    <!-- Item Name -->
                    <div class="details-sec"> 
                      <a href="productDetail?product_id={{$product->id}}">{{$product->name}}</a> 
                      @if($product->discount > 0 && strtotime(date('Y-m-d')) >= strtotime($product->discount_date_start)  && strtotime(date('Y-m-d')) <= strtotime($product->discount_date_end))
                      <?php $priceNow = (100 - $product->discount) * $product->price / 100; ?>
                      <span class="text-line">Rp. {{number_format($product->price,2,',','.')}}</span>
                      <span class="font-montserrat">Rp. {{number_format($priceNow,2,',','.')}}</span>
                      @else
                      <span class="font-montserrat">Rp. {{number_format($product->price,2,',','.')}}</span>
                      @endif
                    </div>
                  </div>
                </li>
                @endforeach

              </ul>
              <?php  
                $search = Input::get('search');
                $category_id = Input::get('category_id');
                if(isset($category_id)){
                  echo $products->appends(array('category_id' => $category_id))->links(); 
                }
                else{
                  echo $products->appends(array('search' => $search))->links();
                }
              ?>
              @endif
            </div>

          </div>
        </div>
      </div>
    </section>

  </div>
  
<!-- Product Details Modal  -->
<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog"
     aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
  
@endsection

@section('javascript')
<!-- include custom script for only homepage  -->
<script src="{{ asset('public/assets/user/js/home.js') }}"></script>


@endsection
