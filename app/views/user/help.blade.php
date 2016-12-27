@extends('user.templates.layout')

@section('content')
<div class="container main-container headerOffset">
                <div class="row userInfo">

                    <div class="col-xs-12 col-sm-12">

                        <h1 class="title-big text-center section-title-style2">
                            <span> Contact us </span>
                        </h1>

                        <p class="lead text-center">
                            Bandungmall adalah sebuah toko online yang didirikan untuk membantu masyarakat Indonesia berjualan secara Online.
                            Untuk mendukung hal tersebut berikut adalah beberapa pertanyaan umum yang sering diajukan

                        </p>
                        <nav class="sidemenuwrap" id="scroller" align="left">
			              <ul class="nav nav-pills nav-stacked">
			                  <li><a href="#help1">Pembayaran</a></li>
			                  <li><a href="#help2">Pengiriman</a></li>
			                  <li><a href="#help3">Check Pesanan</a></li>
			                  <li><a href="#help4">Permasalahan Produk</a></li>
			                  <li><a href="#help5">Cara Berbelanja</a></li>
			                  <li><a href="#help6">Hubungi Kami</a></li>
			                </ul>
			            </nav>

                        <hr>

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="help1">

                                <h3 class="block-title-5">
                                    Pembayaran
                                </h3>

                                <p>
                                    Pembayaran dalam bertransaksi di tokocerdas.com dilakukan dengan cara transfer ke rekening BCA  CV Nusantara Artifisial.<br />
                                    Berikut merupakan rekening milik CV Nusantara Artifisial.

                                    <br>
                                    <strong>
                                        BCA
                                    </strong>
                                    : no. rek : 2820105586
                                    <br>
                                    <strong>
                                        an. CV Nusantara Artifisial
                                    </strong>
                                </p>


                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="help2">

                                <h3 class="block-title-5">
                                    Pengiriman
                                </h3>

                                <p>
                                    Pengiriman barang dilakukan dengan jasa pengiriman JNE/Tiki.<br />
                        			Paket yang tersedia:

                                    <br>
                                    <li>JNE Reguler</li>
					                <li>JNE Express</li>
					                <li>TIKI Reguler</li>
					                <li>TIKI Express</li>
                                </p>


                            </div>

                            <div style="clear:both"></div>
                            <hr>
                            <div style="clear:both"></div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id ="help3">
                                <h3 class="block-title-5">
                                    Check Pesanan
                                </h3>

                                <p>
                                   Cara mengecek status pesanan:<br />
                        
                          			Setelah login, masuk ke <span class="text-info">Akun</span> > <span class="text-info">Check Pesanan</span> > Masukkan nomor pesanan yang didapatkan melalui email setelah melakukan konfirmasi transfer atau <a href="customer-check.html">klik disni.</a><br /><br />Ada 3 macam status yaitu:</p>
			                        <ul class="nols">
			                           <li>PENDING: barang masih disiapkan oleh seller.</li>
			                           <li>SENT: barang sudah dikirim.</li>
			                           <li>NOT AVAILABLE: nomor pesanan yang dimasukkan tidak cocok.</li>   
			                        </ul>
                                </p>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id = "help4">
                                <h3 class="block-title-5">
                                    Permasalahan Produk
                                </h3>

                                <p>
                                    Bandungmall tidak melayani pengembalian produk ataupun refund atas kerusakan barang bagi customer, Namun kami menyediakan fasilitas untuk mengkontak merchant melalui menu message. Customer dan merchant bisa mendiskusikan jalan keluar bersama (seperti pengembalian barang/refund).
                        			<br />Cara memasuki menu message:
                        			<br />Setelah login, masuk ke <span class="text-info">Akun</span> > <span class="text-info">Riwayat Pesanan</span> > Pilih produk yang mau ditanya dengan merchant atau <a href="customer-riwayat.html">klik disni.</a><br />
                                </p>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id = "help5">
                                <h3 class="block-title-5">
                                    Cara Berbelanja
                                </h3>

                                <p>
                                    <ul>
			                            <li>Pilih barang yang mau dibeli</li>
			                            <li>Masukkan kuantitas kemudian tekan tombol <span class="text-info">Beli</span></li>
			                            <li>Setelah masuk ke menu shopping cart, tekan tombol <span class="text-info">Bayar</span>, jika masih ingin membeli barang yang lain, tekan <span class="text-info">Kembali belanja</span></li>
			                            <li>Masukkan data customer untuk menentukan tujuan pengiriman barang dan pilih paket kurir yang diinginkan, kemudian lakukan pengecekkan barang. Jika sudah, tekan tombol <span class="text-info">Lanjut ke menu konfirmasi</span></li>
			                            <li>Cek jumlah yang harus ditransfer, setelah itu transfer ke salah satu rekening CV Nusantara Artifisial</li>
			                            <li>Masukkan nomor rekening,nominal dan rekening CV Nusantara Artifisial yang ditransfer(BCA). CV Nusantara Artifisial akan mencocokkan transaksi dengan mutasi rekening CV Nusantara Artifisial sesuai dengan input dari customer, CV Nusantara Artifisial akan memberi tahu kepada merchant untuk mengirimkan barang yang dipesan customer apabila transfer dana dari customer sesuai dengan harga yang ditetapkan.</li>
			                        </ul>
                                </p>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id = "help6">
                                <h3 class="block-title-5">
                                    Hubungi Kami
                                </h3>

                                <form class="form-horizontal">
		                            <div class="form-group row" align="right">
		                                <label class="control-label col-sm-2 col-xs-4"><span class="glyphicon glyphicon-envelope"></span> :</label>
		                                <div class="padded col-sm-10 col-xs-8" align="left">
		                                    <p class="form-control-static">support@bandungmall.com</p>
		                                </div>
		                            </div>
		                        </form>

                            </div>

                        </div>
                        <!--/.row-->
                    </div>
        <div style="clear:both"></div>
                        <!--div class="w100 map">
                            <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=london&amp;ie=UTF8&amp;hq=&amp;hnear=London,+United+Kingdom&amp;ll=51.511214,-0.119824&amp;spn=0.007264,0.021136&amp;t=m&amp;z=14&amp;output=embed">
                            </iframe>
                            <br/>
                            <small>
                                <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=+&amp;q=london&amp;ie=UTF8&amp;hq=&amp;hnear=London,+United+Kingdom&amp;ll=51.511214,-0.119824&amp;spn=0.007264,0.021136&amp;t=m&amp;z=14"
                                   style="color:#0000FF;text-align:left">
                                    View Larger Map
                                </a>
                            </small>

                        </div-->

    <!-- ./main-container -->
    <div class="gap"></div>
</div>
</div>
@endsection