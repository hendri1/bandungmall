@extends('user.templates.layout')

@section('stylesheet')
<link href="{{ asset('public/assets/user/bootstrap/css/bootstrap.css" rel="stylesheet') }}">
<!-- styles needed by footable  -->
    <link href="{{ asset('public/assets/user/css/footable-0.1.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/assets/user/css/footable.sortable-0.1.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="container main-container headerOffset">

    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{ URL::to('home')}}">Home</a></li>
                <li><a href="{{ URL::to('user/myAccount')}}">My Account</a></li>
                <li class="active"> Order List</li>
            </ul>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> Order List </span></h1>

            <div class="row userInfo">
                <div class="col-lg-12">
                    <h2 class="block-title-2"> Your Order List </h2>
                </div>
                <div style="clear:both"></div>

                <div class="col-xs-12 col-sm-12">
                    <table class="footable">
                        <thead>
                        <tr>
                            <th data-class="expand" data-sort-initial="true"><span
                                    title="table sorted by this column on load">Order ID</span></th>
                            <th data-hide="phone,tablet" data-sort-ignore="true">No. of items</th>
                            <th data-hide="phone,tablet" data-sort-ignore="true">Invoice</th>
                            <th data-hide="phone,tablet"><strong>Payment Method</strong></th>
                            <th data-hide="phone,tablet"><strong>Notif Pengiriman</strong></th>
                            <th data-hide="phone,tablet"><strong>No Resi</strong></th>
                            <th data-hide="default"> Price</th>
                            <th data-hide="default"> Kurir</th>
                            <th data-hide="default" data-type="numeric"> Date</th>
                            <th data-hide="default" data-type="numeric"> Status Pembayaran</th>
							<th data-hide="default" data-type="numeric"> Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($transactionsUnpaid as $unpaid)
                            <tr>
                                <td>{{$unpaid->id}}{{$unpaid->user_id}}</td>
                                <?php $totalItem = 0; $productName=""; ?>
                                @foreach ($details as $detail)
                                    @foreach ($detail as $product)
                                        @if($product->transaction_id === $unpaid->id)
                                        <?php
                                            $totalItem = $totalItem + $product->quantity;
                                            $tempString = $product->name."[".$product->quantity."]"." SubTotal:Rp.".$product->sub_total;
                                            $productName = $productName ." , ".$tempString;
                                            if(strcmp($product->is_accepted,"pending") === 0){
                                                $pengiriman = "false";
                                            }else{
                                                $pengiriman = "true";
                                            }
                                        ?>
                                        @endif
                                    @endforeach
                                @endforeach
                                <td>{{$totalItem}}
                                    <small>item(s)</small>
                                </td>
                                <td>{{$productName}}</td>
                                <td>Transfer Bank</td>
                                <td>@if(strcmp($unpaid->sent_status,"yes")===0)
                                        <span class="label label-primary">Barang sedang dikirim</span>
                                    @else
                                        <span class="label label-danger">Belum ada konfirmasi pengriman</span>
                                    @endif</td>
                                @foreach ($details as $detail)
                                    @foreach ($detail as $product)
                                        @if($product->transaction_id === $unpaid->id)
                                        <?php
                                            $resi = $product->resi;
                                        ?>
                                        @endif
                                    @endforeach
                                @endforeach
                                <td>
                                @if($resi != '')
                                    {{$resi}}
                                @else
                                    Belum ada resi
                                @endif
                                </td>
                                <td>{{$unpaid->total}}</td>
                                <td>{{$unpaid->shipping_choice}} {{$unpaid->shipping_type}}</td>
                                <td data-value="78025368997">{{$unpaid->created_at->format('Y-m-d')}}</td>
                                @if($unpaid->paid === "no")
                                    <td data-value="3"><span class="label label-default">Belum Bayar</span>
									<td><a href="{{URL::to('user/transactionPayment?transaction_id='.$unpaid->id)}}"><span class="btn btn-default">Bayar</span></a>
                                @elseif($unpaid->paid === "pending")
                                    <td data-value="2"><span class="label label-default">Menunggu Konfirmasi</span>
								@else
                                    <td data-value="2"><span class="label label-success">Sudah Bayar</span>
                                @endif
                                </td>
                            </tr>
                            @endforeach

                            @foreach($transactionsPaid as $paid)
                            <tr>
                                <td>{{$paid->id}}{{$paid->user_id}}</td>
                                <?php $totalItem = 0; $productName=""; $pengiriman=""; ?>
                                @foreach ($details as $detail)
                                    @foreach ($detail as $product)
                                        @if($product->transaction_id === $paid->id)
                                        <?php
                                            $totalItem = $totalItem + $product->quantity;
                                            $tempString = $product->name."[".$product->quantity."]"." SubTotal:Rp.".$product->sub_total;
                                            $productName = $productName ."   ".$tempString;
                                            if(strcmp($product->is_accepted,"pending") === 0){
                                                $pengiriman = "false";
                                            }else{
                                                $pengiriman = "true";
                                            }
                                        ?>
                                        @endif
                                    @endforeach
                                @endforeach
                                <td>{{$totalItem}}
                                    <small>item(s)</small>
                                </td>
                                <td>{{$productName}}</td>
                                <td>Transfer Bank</td>
                                <td>wow
                                    @if(strcmp($paid->sent_status,"yes")===0)
                                        @if($paid->received_status == 'no')
                                        <span class="label label-primary">Barang sedang dikirim</span>
                                        @else
                                        <span class="label label-primary">Barang sudah sampai</span>
                                        @endif
                                    @else
                                        <span class="label label-danger">Belum ada konfirmasi pengriman</span>
                                    @endif
                                </td>
                                @foreach ($details as $detail)
                                    @foreach ($detail as $product)
                                        @if($product->transaction_id === $paid->id)
                                        <?php
                                            $resi = $product->resi;
                                        ?>
                                        @endif
                                    @endforeach
                                @endforeach
                                <td>
                                @if($resi != '')
                                    {{$resi}}
                                @else
                                    Belum ada resi
                                @endif
                                </td>
                                <td>{{$paid->total}}</td>
                                <td>{{$paid->shipping_choice}} {{$paid->shipping_type}}</td>
                                <td data-value="78025368997">{{$paid->created_at->format('Y-m-d')}}</td>
                                @if($paid->paid === "no")
                                    <td data-value="3"><span class="label label-default">Belum Terkonfirmasi</span>
                                @else
                                    <td data-value="2"><span class="label label-success">Sudah Terkonfirmasi</span></td>
                                    @if($paid->received_status == 'no')
                                    <td><a href="{{URL::to('user/doTransactionReceived?transaction_id='.$paid->id)}}"><span class="btn btn-default">Barang Sampai</span></a></td>
                                    @endif
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>

                <div style="clear:both"></div>

                <div class="col-lg-12 clearfix">
                    <ul class="pager">
                        <li class="previous pull-right"><a href="{{URL::to('home')}}"> <i class="fa fa-home"></i> Go to Shop </a>
                        </li>
                        <li class="next pull-left"><a href="{{URL::to('user/myAccount')}}"> &larr; Back to My Account</a></li>
                    </ul>
                </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /main-container -->

<div class="gap"></div>
@endsection

@section('javascript')
<!-- include footable plugin -->
<script src="{{ asset('public/assets/user/js/footable.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/user/js/footable.sortable.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.footable').footable();
    });
</script>
@endsection