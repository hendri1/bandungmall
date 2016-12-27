@extends('user.templates.layout')

@section('content')
<!-- /.Fixed navbar  -->
<style>
	.headerOffset {
		padding-top: 100px;
	}
</style>
		
<div class="container main-container headerOffset">

    <!-- Main component call to action -->

    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li class="active">
                @if(isset($category))
                    {{$category->name}}
                @else
                    Search
                @endif
                @if(isset($category_parent)){{$category_parent->name}}@endif
                </li>
            </ul>
        </div>
    </div>
    <!-- /.row  -->
    <div class="row">
      @include('user.left_navbar')
        <!--right column-->
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="w100 clearfix category-top">
                @if(isset($category_parent))
                    <h2 style="text-transform: uppercase; ">Koleksi {{$category_parent->name}}</h2>
                @else
                    <h2 style="text-transform: uppercase; ">Hasil Pencarian</h2>
                @endif               
            </div>
            <!--/.category-top-->
            @if($products->isEmpty())
            <div class="w100 productFilter clearfix">
              <h2>Tidak ada produk ditemukan</h2>
            </div>
            @else
            <div class="w100 productFilter clearfix">
                <p class="pull-left"> Showing <strong>{{$products-> count()}}</strong> products </p>

                <div class="pull-right ">
                    <div class="change-view pull-right"><a href="#" title="Grid" class="grid-view"> <i
                            class="fa fa-th-large"></i> </a> <a href="#" title="List" class="list-view "><i
                            class="fa fa-th-list"></i></a></div>
                </div>
            </div>
            <!--/.productFilter-->
            <div class="row  categoryProduct xsResponse clearfix">
                @foreach ($products as $product)
                <!--/.item-->
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <div class="image">
                            <a href="productDetail?product_id={{$product->id}}"><img style="height:240px;" src="{{$product->image_link }}" alt="img"
                                                                class="img-responsive"></a>
                            @if($product->discount > 0 && strtotime(date('Y-m-d')) >= strtotime($product->discount_date_start)  && strtotime(date('Y-m-d')) <= strtotime($product->discount_date_end))
                            <div class="promotion"><span class="discount">{{$product->discount}}% OFF</span></div>
                            @endif
                        </div>
                        <div class="description">
                            <h4><a href="productDetail?product_id={{$product->id}}">{{$product->name}}</a></h4>
                            <div class="grid-description">
                                <p>{{$product->brand}} </p>
                            </div>
                            <div class="list-description">
                                <p> {{$product->description}} </p>
                            </div>
                        </div>
			@if($product->discount > 0 && strtotime(date('Y-m-d')) >= strtotime($product->discount_date_start)  && strtotime(date('Y-m-d')) <= strtotime($product->discount_date_end))
                        <div class="price"><span class="price-sales"> <?php $priceNow = (100 - $product->discount) * $product->price / 100; ?>Rp. {{number_format($priceNow,2,',','.')}}</span>
                            <span class="price-standard" style="font-size:13px;">Rp. {{number_format($product->price,2,',','.')}}</span>
                        </div>
                        @else
                        <div class="price"><span class="price-sales">Rp. {{number_format($product->price,2,',','.')}}</span>
                        </div>
                        @endif
                        <div class="action-control"><a class="btn btn-primary" href="{{ URL::to('productDetail?product_id=' . $product->id) }}"> <span class="add2cart"><i
							class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                @endforeach
            </div>
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
            <!--/.categoryProduct || product content end-->

            <!--div class="w100 categoryFooter">
                <div class="pagination pull-left no-margin-top">
                    <ul class="pagination no-margin-top">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
                <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <p>Showing 12 of 1–450 results</p>
                </div>
            </div-->
            @endif
            <!--/.categoryFooter-->
        </div>
        <!--/right column end-->
    </div>
    <!-- /.row  -->
</div>
<!-- /main container -->

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
