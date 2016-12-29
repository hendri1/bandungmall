@extends('user.templates.layout')

@section('content')
  <!-- CONTENT START -->
  <div class="content">
    
    <!--======= SUB BANNER =========-->
    <section class="sub-banner animate fadeInUp" data-wow-delay="0.4s">
      <div class="container">
        <h4>{{$product->name}}</h4>
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li><a href="product?category_id={{$category->category_id}}">{{$category->category_name}} {{$category->category_parent_name}}</a></li>
          <li class="active">{{$product->name}}</li>
        </ol>
      </div>
    </section>

    <!--======= PAGES INNER =========-->
    <section class="section-p-30px pages-in item-detail-page">
      <div class="container">
        <div class="row"> 
          
          <!--======= IMAGES SLIDER =========-->
          <div class="col-sm-6 large-detail animate fadeInLeft" data-wow-delay="0.4s">
            <div class="images-slider">
              <ul class="slides">
                @foreach($product_images as $product_img)
                <li data-thumb="{{$product_img->image_link}}">
                  <a href="{{$product_img->image_link}}"><img src="{{$product_img->image_link}}" class="img-responsive" alt="img"></a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>

          <!--======= ITEM DETAILS =========-->
          <div class="col-sm-6 animate fadeInRight" data-wow-delay="0.4s">
            <div class="row">
              <div class="col-sm-12">
                <h5>{{$product->name}}</h5>

                @if($product->discount > 0 && strtotime(date('Y-m-d')) >= strtotime($product->discount_date_start)  && strtotime(date('Y-m-d')) <= strtotime($product->discount_date_end))
                <?php $priceNow = (100 - $product->discount) * $product->price / 100; ?>
                <span class="price">Rp. {{number_format($priceNow,2,',','.')}}</span> 
                @else
                <span class="price">Rp. {{number_format($product->price,2,',','.')}}</span>
                @endif

              </div>
              <div class="col-sm-12"> 
                <span class="code">PRODUCT CODE: {{$product->id}}{{$product->merchant_id}}{{$product->category_id}}</span>
                <div class="some-info no-border"> <br>
                  @if ($product->is_active ==="yes")
                  <div class="in-stoke"> <i class="fa fa-check-circle"></i> IN STOCK</div>
                  @else
                  <div class="in-stoke"> <i class="fa fa-minus-circle"></i> OUT OF STOCK</div>
                  @endif
                  <div class="in-stoke"> <i class="fa fa-lock"></i> SECURE ONLINE ORDERING</div>
                </div>
              </div>  
            </div>
            <form action="{{ URL::to('cart/add') }}" method="POST">
              <input type="hidden" name="product_id" value="{{$product->id}}">
              <div class="row">
                <div class="col-sm-12">
                  <div class="item-select"> 
                    <!-- JUMLAH -->
                    <p>JUMLAH</p>
                    <input class="form-control" type="number" name="quantity" value="0" min="0" required>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="item-select"> 
                    <!-- COLOR -->
                    <p>COLOR</p>
                    <select class="selectpicker" name="color" required>
                      <option value="{{$product->color}}" selected>{{$product->color}}</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="item-select"> 
                    <!--  UKURAN -->
                    <p>UKURAN</p>
                    @if(!is_numeric($product->size))
                      <?php $size = explode(",",$product->size) ?>
                      <select class="selectpicker" name="size[]" required multiple>
                      @foreach($size as $val)
                        <option value="{{$val}}">{{$val}}</option>
                      @endforeach
                      </select>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row"> 
                <!-- QUIENTY -->
                <div class="col-sm-12">
                  <div class="fun-share">
                    <button type="submit" class="btn btn-small btn-dark">ADD TO CART</button>
                  </div>
                </div>
              </div>
            </form>

            <!--======= PRODUCT DESCRIPTION =========-->
            <div class="item-decribe animate fadeInUp" data-wow-delay="0.4s">
              <div class="text-center"> 
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#descr" aria-controls="men" role="tab" data-toggle="tab">DETAILS</a></li>
                  <li role="presentation"><a href="#review" aria-controls="women" role="tab" data-toggle="tab">SHIPPING</a></li>
                </ul>
              </div>
              <!-- Tab panes -->
              <div class="tab-content"> 
                <!-- DETAILS -->
                <div role="tabpanel" class="tab-pane fade in active" id="descr">
                  {{$product->description}}
                  <table class="table">
                    <tbody>
                      <tr>
                        <td style='margin-right:5px;'><strong>Brand</strong></td>
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
                
                <!-- SHIPPING -->
                <div role="tabpanel" class="tab-pane fade" id="review">
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
                
                <!-- TAGS -->
                <div role="tabpanel" class="tab-pane fade" id="tags"> </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--======= RELATED PRODUCTS =========-->
      <section class="section-p-60px new-arrival new-arri-w-slide">
        <div class="container"> 
          
          <!--  Tittle -->
          <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
            <h5>YOU MAY ALSO LIKE</h5>
          </div>
          
          <!--  New Arrival Tabs Products  -->
          <div class="popurlar_product client-slide-4 animate fadeInUp" data-wow-delay="0.4s"> 
            
            @forelse ($products as $recomendation)
            <!--  New Arrival  -->
            <div class="items-in"> 
              <!-- Image --> 
              <img src="{{ asset($recomendation->image_link) }}" alt=""> 
              <!-- Hover Details -->
              <div class="over-item">
                <ul class="animated fadeIn">
                  <li class="full-w"> <a href="{{ URL::to('productDetail?product_id=' . $recomendation->id) }}" class="btn">ADD TO CART</a></li>
                </ul>
              </div>
              <!-- Item Name -->
              <div class="details-sec"> <a href="{{ URL::to('productDetail?product_id=' . $recomendation->id) }}">{{ $recomendation->name }}</a> <span class="font-montserrat">Rp {{ number_format($recomendation->price,2,',','.') }}</span> </div>
            </div>
            @empty
            <p class="lead text-center">Belum ada produk</p>
            @endforelse

          </div>
        </div>
      </section>

    </section>

  </div>
@endsection