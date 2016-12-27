@extends('user.templates.layout')

@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/cart')}}">Cart</a></li>
                <li class="active">Final Order</li>
            </ul>
        </div>
    </div>
    <!--/.row-->


    <div class="row">
        <div class="col-lg-12 ">
            <div class="row userInfo">

                <div class="thanxContent text-center">

                    <h1> Terima kasih atas pemesanan order <a href="{{URL::to('/user/transactionHistory')}}">#{{$transaction->id}}</a></h1>
                    <h4> Barang yang dipesan akan sesegera mungkin dikonfirmasi dan dikirim kepada anda</h4>

                </div>

                <div class="col-lg-7 col-center">
                    <h4></h4>

                    <div class="cartContent table-responsive  w100">
                        <table style="width:100%" class="cartTable cartTableBorder">
                            <tbody>

                            <tr class="CartProduct  cartTableHeader">
                                <td colspan="2"> Barang yang akan dikirim</td>


                                <td style="width:15%"></td>
                            </tr>
                            @foreach($final_cart as $product)

                            <tr class="CartProduct">
                                <td class="CartProductThumb">
                                    <div><a href="{{URL::to('productDetail?product_id='.$product->id)}}"><img class="img-responsive" src="{{URL::to($product->image_link)}}" alt="img" ></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="CartDescription">
                                        <h4><a href="{{URL::to('productDetail?product_id='.$product->id)}}">{{$product->name}} </a></h4>
                                        <span class="size">Rp. {{$product->price}}</span>

                                        <div class="price"><span>
                                            @if( $product->discount_date_start >= date("Y-m-d") && $product->discount_date_end <= date("Y-m-d") && $product->discount > 0)
                                                <div class="product-price"><span class="price-sales"> 
                                                    <?php $priceNow = (100 - $product->discount) * $product->price / 100; ?>Discount Price : Rp. {{$priceNow}}
                                                </span> 
                                            @else
                                            @endif</span></div>
                                    </div>
                                </td>


                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                        <div class="cartFooter w100">
                            <div class="box-footer">
                                <div class="pull-left"><a href="{{URL::to('/')}}" class="btn btn-default"> <i
                                        class="fa fa-arrow-left"></i> &nbsp; Continue shopping </a></div>
                                <div class="pull-right"><a href ="{{URL::to('/user/transactionHistory')}}" class="btn btn-default"> &nbsp;Lihat Pemesanan 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--/row end-->

        </div>

        <!--/rightSidebar-->

    </div>
    <!--/row-->
    <div class="gap"></div>

    <div class="row">
            <div class="col-sm-6">
                <div id="bordered">
                    <p>Total pembelian anda sebesar <strong class="text-info">Rp. {{number_format($transaction->total, 0, '', '.');}},- </strong>(belum termasuk ongkos kirim)</p>
                    <ul class="padbottom">
                    <li>Silahkan di transfer ke salah satu nomor rekening yang tertera dibawah ini.<strong>(BCA)</strong></li>
                    <li>Setelah itu masukkan nomor rekening yang anda gunakan dan nominal yang di transfer pada kotak <strong>Konfirmasi Pembayaran</strong> untuk melanjutkan transaksi.</li>
                    
                    </ul>
                    <h3>Nomor rekening bandungmall.com</h3>
                    <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th scope="row">BCA</th>
                            <td>2820105586</td>
                            <td>an. cv nusantara artifisial</td>
                          </tr>
                          <!--
                          <tr>
                            <th scope="row">Mandiri</th>
                            <td>XXXX-XXXX-XXXX</td>
                            <td>an. PT. goget.com</td>
                          </tr>
                          -->
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div id="bordered">
                    <h3>Konfirmasi Pembayaran</h3>
                    <hr />
                        <form action="{{ URL::to('user/doInsertPaymentConfirmation') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="norek">Upload Bukti:</label>
                                <input type="file" name="images[]" id="images" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="transaction_id" value="{{$transaction->id}}" />
                                <input type="submit" class="btn btn-primary" value="UPLOAD"/>
                            </div>
                        </form>
                        <!-- <form action="{{URL::to('user/doInsertPaymentConfirmation')}}" method="post" role="form">
                        <div class="form-group">
                            <select class="form-control" name="account_bank" id="bankSelector" onchange="run()">
                                <option value="0" selected>Pilih Bank</option>
                                @foreach($banks as $bank)
                                    <option value="{{$bank->id_user_bank}}">{{$bank->bank_account}} ({{$bank->nama_bank}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="norek">Nama Rekening:</label>
                            <input type="text" name="account_name" id="account_name" class="form-control" id="nama-rek" placeholder="Nama rekening anda" required readonly/>
                        </div>
                        <div class="form-group">
                            <label for="norek">Nomor Rekening:</label>
                            <input type="text" name="account_number" id="account_number" class="form-control" id="no-rek" placeholder="Nomor rekening anda" required readonly/>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal:</label>
                            <input type="text" name="amount" class="form-control" id="nominal" placeholder="Nominal yang anda transfer" required/>
                        </div>
                        <div class="form-group">
                            <label for="tiperek">Tujuan Transfer:</label>
                            <select name="account_destination" class="form-control" id="tiperek" required>
                                <option value="bca">BCA cv nusantara artifisial</option>
                                <option value="mandiri">Mandiri PT. goget</option>
                            </select>
                        </div>
                        <input type="hidden" name="transaction_id" value="{{$transaction->id}}" />
                        <button class="btn btn-primary" type="submit">Konfirmasi</button>
                    </form> -->
                </div>
            </div>
        
        </div>
</div>
<!-- /.main-container -->

<div class="gap"></div>
@endsection
<script type="text/javascript">
function run(){
    var bank_id = $("#bankSelector").val();
    $.ajax({
        data: 'bank_id='+bank_id,
        url: "getAccountBank", 
        success: function(result){
            if(result.length > 0){
                $("#account_name").val(result[0]['nama_rekening']);
                $("#account_number").val(result[0]['no_rekening']);
            }else{
                $("#account_name").val('');
                $("#account_number").val('');
            }
        }
    });
    document.getElementById("bank_id").value = document.getElementById("bankSelector").value;
}
</script>