@extends('user.templates.layout')

@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="product?category_id={{$category->category_id}}">{{$category->category_name}} {{$category->category_parent_name}}</a></li>
                <li class="active">{{$product->name}}</li>
            </ul>
        </div>
    </div>

    <div class="row transitionfx">

        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- product Image and Zoom -->

            <div class="main-image sp-wrap col-lg-12 no-padding style3">
                @foreach($product_images as $product_img)
                <a href="{{$product_img->image_link}}"><img src="{{$product_img->image_link}}" class="img-responsive" alt="img"></a>
                @endforeach
            </div>
        </div>
        <!--/ left column end -->

        <!-- right column -->
        <div class="col-lg-6 col-md-6 col-sm-5">
            <h1 class="product-title"> {{$product->name}}</h2>

                <h3 class="product-code">Product Code : {{$product->id}}{{$product->merchant_id}}{{$product->category_id}}</h3>
                @if($product->discount > 0 && strtotime(date('Y-m-d')) >= strtotime($product->discount_date_start)  && strtotime(date('Y-m-d')) <= strtotime($product->discount_date_end))
                <div class="product-price"><span class="price-sales"> <?php $priceNow = (100 - $product->discount) * $product->price / 100; ?>Rp. {{number_format($priceNow,2,',','.')}}</span>
                    <span class="price-standard">Rp. {{number_format($product->price,2,',','.')}}</span>
                    <span style="margin-right:20px; float:none;"class="discount">{{$product->discount}}% OFF</span>
                </div>
                @else
                <div class="product-price"><span class="price-sales">Rp. {{number_format($product->price,2,',','.')}}</span>
                </div>
            	@endif

				<div class="productThumb"></div>
                <!--/.productThumb-->
                <div class="productFilter productFilterLook2">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                        <form action="{{ URL::to('cart/add') }}" method="POST">
                        @if($errors->any())
                            <h4 style="color:#ff0000">{{$errors->first()}}</h4>
                        @endif
                        	Jumlah : 
                            <div class="filterBox">
                                <input class="form-control" type="number" name="quantity" value="0" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:10px;" class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            Ukuran : 
                            @if(!is_numeric($product->size))
                                {{--*/ $size = explode(",",$product->size) /*--}}
                                <div class="filterBox">
                                    @foreach($size as $val)
                                        <input type="checkbox" value="{{$val}}" name="size[]">{{$val}}&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div style="margin-top:10px;" class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            Warna : 
                            <div class="filterBox">
                                <select class="form-control" name="color" id="selector_color">
                                    <option value="{{$product->color}}" selected>{{$product->color}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- productFilter -->

                <div class="cart-actions">
                    <div class="addto row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input name="product_id" value = "{{$product->id}}" type = "hidden">
                                    <input name="submit" class="button btn-block" title="Add to Cart" value="Add to Cart" type="submit">
                            </form>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    	@if ($product->is_active ==="yes")
                    	<h3 class="incaps"><i class="fa fa fa-check-circle-o color-in"></i> In stock</h3>
                    	@else
                    	<h3><i class="fa fa-minus-circle color-out"></i> Out of stock</h3>
                    	@endif

                    <h3 class="incaps"><i class="glyphicon glyphicon-lock"></i> Secure online ordering</h3>
                </div>
                <!--/.cart-actions-->

                <div class="clear"></div>
                <div class="product-tab w100 clearfix">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                        <li><a href="#shipping" data-toggle="tab">Shipping</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="details">
                            {{$product->description}}
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td style='margin-righ:5px;'><strong>Brand</strong></td>
                                    <td>{{$product->brand}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Dilihat</strong></td>
                                    <td>{{$product->viewed}} orang</td>
                                </tr>
                                @if($product->discount > 0 && strtotime(date('Y-m-d')) >= strtotime($product->discount_date_start)  && strtotime(date('Y-m-d')) <= strtotime($product->discount_date_end))
                                <tr>
                                    <td><strong>Batas Diskon</strong></td>
                                    <td>{{date('d-M-Y',strtotime($product->discount_date_end))}}</td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="shipping">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>JNE</td>
                                    <td>TIKI</td>
                                </tr>
                                <tr>
                                    <td>Biasa</td>
                                    <td>Kilat</td>
                                </tr>
                                <tr>
                                    <td>Tarif JNE</td>
                                    <td>Tarif TIKI</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3">* Biaya pengiriman dibayarkan setelah barang sampai</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab content -->

                </div>
                <!--/.product-tab-->

                <div style="clear:both"></div>
                <!--div class="product-share clearfix">
                    <p> SHARE </p>

                    <div class="socialIcon"><a href="#"> <i class="fa fa-facebook"></i></a> <a href="#"> <i
                            class="fa fa-twitter"></i></a> <a href="#"> <i class="fa fa-google-plus"></i></a> <a
                            href="#">
                        <i class="fa fa-pinterest"></i></a></div>
                </div-->
                <!--/.product-share-->

        </div>
        <!--/ right column end -->

    </div>
    <!--/.row-->

    <div class="row recommended" style="margin-bottom: 30px;">
        <h1> YOU MAY ALSO LIKE </h1>


        <div class="section-content">
            <div class="row has-equal-height-child">

              @forelse ($products as $recomendation)
                <div class="itemRecomendation itemauto col-lg-3 col-md-3 col-sm-6 col-xs-6">
                  <div class="product">
                    <div class="imageHoverRecomendation">
                      <div id="carousel-id-2" class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                          <div class="itemRecomendation active">
                            <a href="{{ URL::to('productDetail?product_id=' . $recomendation->id) }}">
                              <img src="{{ asset($recomendation->image_link) }}" alt="img" class="img-responsive">
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="description">
                        <h4><a href="{{ URL::to('productDetail?product_id=' . $product->id) }}"> {{ $recomendation->name }} </a></h4>

                        <p class="text-center">Rp {{ number_format($recomendation->price,2,',','.') }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <p class="lead text-center">Belum ada produk</p>
              @endforelse
            </div>
          </div>
        </div>

        <!--/.SimilarProductSlider-->
    </div>
    <!--/.recommended-->

    <div style="clear:both"></div>
</div>
<!-- /main-container -->
@endsection

@section('javascript')

<script>
    $(function () {

        $('.rating-tooltip-manual').rating({
            extendSymbol: function () {
                var title;
                $(this).tooltip({
                    container: 'body',
                    placement: 'bottom',
                    trigger: 'manual',
                    title: function () {
                        return title;
                    }
                });
                $(this).on('rating.rateenter', function (e, rate) {
                    title = rate;
                    $(this).tooltip('show');
                })
                        .on('rating.rateleave', function () {
                            $(this).tooltip('hide');
                        });
            }
        });

	});
</script>
@endsection