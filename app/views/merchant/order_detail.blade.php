@extends('layout.merchant')

@section('isi')
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div id="bordered">
              <div class="row">
                    <div class="col-sm-12">
                      <div class="order-head">
                            <li>Order ID: {{$transaction->id}}</li>
                            <li>Tanggal Order: {{date_format(new datetime($transaction->created_at), 'g:ia jS F Y')}}</li>
                            <li>Paket Pengiriman: {{$transaction->shipping_choice.'/'.$transaction->shipping_type}}</li>
                            <li>Nama Penerima: {{$transaction->user_name}}</li>
                            <li>Alamat: {{$transaction->user_address}}</li>
                            <li>Kota: {{$transaction->city}}</li>
                            <li>Kode Pos: {{$transaction->postal_code}}</li>
                            <li>No. Telp: {{$transaction->phone_number}}</li>
                        </div>
                    </div>
                </div>
                  <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                          </tr>
                          <?php $totalBerat=0;
                        $subtotal=0;
                      ?>
                      <?php $totalBerat=0;
                        $subtotal=0;
                      ?>
                      @foreach($transaction_details as $detail)
                      <tr>
                        <td><img class="img-responsive" src="{{asset(''.$detail->image_link)}}" width="50" height="50" /></td>
                        <td>{{$detail->name}}<br />{{$detail->brand}}</td>
                        <td>
                          <?php $temp = $detail->price; ?>
                          <p>Rp. {{number_format($detail->price, 0, '', '.');}} ,-</p>
                        </td>

                        <td>{{$detail->quantity}}</td>
                        <td>Rp. {{number_format($temp*$detail->quantity, 0, '', '.');}},-</td>
                        <?php $subtotal += ($temp*$detail->quantity)?>
                      </tr>
                      @endforeach
                        <tr>
                            <th colspan="4">Total</th>
                            <td>Rp. {{number_format($subtotal, 0, '', '.');}},-</td>
                        </tr>
						
                        </table>
                      </div>
					  
                      <div class="row">
                         <div class="col-xs-12 col-sm-offset-10 col-sm-1" align="center" style="margin-top:10px">
                              <a href="{{URL::to('merchant/orderDetail/doDeclineOrder?id='.$transaction_details[0]->transaction_id)}}" class="btn btn-danger">Tolak</a>
                        </div>
                          <div class="col-xs-12 col-sm-1" align="center" style="margin-top:10px">
                              <a href="{{URL::to('merchant/orderDetail/doAcceptOrder?id='.$transaction_details[0]->transaction_id)}}" class="btn btn-success">Terima</a>
                         </div>
                      </div>
                    </div>
              </div>
           
        </div>
</div>
@stop