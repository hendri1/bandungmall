@extends('merchant.templates.layout')


@section('stylesheet')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('public/assets/merchant/plugins/select2/select2.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('public/assets/merchant/plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('public/assets/merchant/plugins/iCheck/all.css') }}">
  <!-- Colorpicker -->
  <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
@endsection


@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Produk
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <form class="form-horizontal" action="{{ URL::to('merchant/addProduct/doAddProduct') }}" method="POST" enctype="multipart/form-data">
      <!-- Informasi Produk -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Informasi Produk</h3>
        </div><!-- /.box-header -->
        @if(!empty($error_code))
            <span style="margin-left:10px; color:red">* {{$error_code}}</span>
          @endif
        <!-- form start -->
        <div class="box-body">
          <!-- Nama Produk -->
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Nama Produk</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" name="name" value="" required>
            </div>
          </div> <!-- /Nama Produk -->

          <!-- Merk -->
          <div class="form-group">
            <label for="brand" class="col-sm-3 control-label">Merk</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="brand" name="brand" value="" required>
            </div>
          </div> <!-- /Merk -->

          <!-- Kategori -->
          <div class="form-group">
            <label for="category" class="col-sm-3 control-label">Kategori</label>
            <div class="col-sm-9">
              <select id="category" name="category" class="form-control select2">
                <option value="0">Pilih Kategori</option>
                @foreach($categories_child as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->parent_name.' - '.$cat->name }}</option>
                @endforeach
              </select>
            </div>
          </div> <!-- /Kategori -->

          <!-- Deskripsi -->
          <div class="form-group">
            <label for="description" class="col-sm-3 control-label">Deskripsi</label>
            <div class="col-sm-9" id="tempDescription">
              <!-- <textarea class="form-control" rows="4" name="description" id="description" required></textarea> -->
            </div>
          </div> <!-- /Deskripsi -->

          <div class="form-group">
            <label for="size" class="col-sm-3 control-label">Ukuran</label>
            <div class="col-sm-9" id="tempSize">
              <!-- <textarea class="form-control" rows="1" name="size" id="size" required></textarea> -->
            </div>
          </div> <!-- /Size -->

          <!-- Warna -->
          <div class="form-group">
            <label for="color" class="col-sm-3 control-label">Warna</label>
            <div class="col-sm-9">
              <select id="color" name="color" class="form-control select2">
              <option value="0">Pilih Warna</option>
              {{--*/ $x = 1 /*--}}
                 @foreach($colours as $col)
                  @if($x == 1)
                  {{--*/ $colF = $col->kode /*--}}
                  @endif
                  <option value="{{ $col->id }}" data-kode="{{ $col->kode }}">{{ $col->nama }}</option>                  
                  {{--*/ $x++ /*--}}
                @endforeach
              </select>              
            </div>
          </div> <!-- /Warna -->

          <!-- Warna -->
          <div class="form-group">
            <label for="color" class="col-sm-3 control-label">Pallete Warna</label>
            <div class="col-sm-9">
               <div id="pallete" class="input-group colorpicker-component">
                  <input id="pallete-color" type="text" value="" class="form-control" disabled/>
                  <span class="input-group-addon"><i></i></span>
              </div>           
            </div>
          </div> <!-- /Warna -->         

          <!-- Harga -->
          <div class="form-group">
            <label for="price" class="col-sm-3 control-label">Harga</label>
            <div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon">Rp</span>
                <input type="text" class="form-control" id="price" name="price" value="" required>
              </div>
            </div>
          </div> <!-- /Harga -->

        </div><!-- /.box-body -->
      </div><!-- /.Informasi Produk -->

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Gambar</h3>
          <p>Ukuran yang disarankan adalah 324px (lebar) &times; 512px (tinggi). Jika tidak sesuai, maka gambar akan dicrop secara otomatis</p>
          <!-- <a href="#" class="btn btn-success"><i class="fa fa-upload"></i> Tambah</a> -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-sm-3 product-images" id="template-add-image" style="display:none">
              <div class="box box-widget">
                <div class='box-body'>
                  <img class="img-responsive" alt="Photo">
                  <input class="pick-image" style="display:none" type="file" name="images[]" accept="image/*">
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="#" class="text-center delete-image"><i class="fa fa-trash"></i> Hapus </a></li>
                  </ul>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div>
            <div class="col-sm-3">
              <div class="box box-widget">
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="#" class="text-center" id="add-image"><i class="fa fa-upload fa-4x"></i> <h3>Tambah Gambar</h3> </a></li>
                  </ul>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div>
          </div>
        </div>
      </div>

      <!-- Lain-lain -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Lain-lain</h3>
        </div><!-- /.box-header -->
        <div class="box-body">                
          <!-- Kuantitas -->
          <div class="form-group col-sm-6">
            <label for="quantity" class="col-sm-3 control-label">Kuantitas</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="quantity" name="quantity" min="0" max="100" required>
            </div>
          </div> <!-- /Kuantitas -->

          <!-- Berat -->
          <div class="form-group col-sm-6">
            <label for="weight" class="col-sm-3 control-label">Berat</label>
            <div class="col-sm-9">
              <div class="input-group">
                <input type="text" class="form-control" id="weight" name="weight" required>
                <span class="input-group-addon">gram</span>
              </div>
            </div>
          </div> <!-- /Berat -->

          <!-- Diskon -->
          <div class="form-group col-sm-6">
            <label for="discount" class="col-sm-3 control-label">Diskon</label>
            <div class="col-sm-9">
              <div class="input-group">
                <input type="text" class="form-control" id="discount" name="discount" value="0" required>
                <span class="input-group-addon">%</span>
              </div>
            </div>
          </div> <!-- /Diskon -->

          <!-- Tanggal Diskon -->
          <div class="form-group col-sm-6">
            <label for="discount_date" class="col-sm-3 control-label">Tanggal Diskon</label>
            <div class="col-sm-9">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="discount_date" name="discount_date" value="04/11/2016 - 04/17/2016">
              </div><!-- /.input group -->
            </div>
          </div> <!-- /Tanggal Diskon -->

          <div class="form-group col-sm-6">
            <label for="pdkgudang" class="col-sm-3 control-label">Tampilkan <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Jika tidak, maka barang tidak muncul pada halaman customer"></i></label>
            <div class="col-sm-9">
              <input type="checkbox" class="minimal" checked value="yes" name="pdkgudang">
            </div>
          </div>
        </div>
      </div>

      <div class="box box-success">
        <div class="box-footer no-padding">
          <ul class="nav nav-stacked">
            <li><a href="#" class="text-center" id="submit"><h3><i class="fa fa-plus"></i> Tambah Produk </h3></a></li>
            <input type="submit" style="display:none">
          </ul>
        </div><!-- /.box-footer -->
      </div><!-- /.Lain-lain -->
    </form>

  </section><!-- /.content -->
@endsection


@section('javascript')
  <!-- Plugins -->
  <!-- Select2 -->
  <script src="{{ asset('public/assets/merchant/plugins/select2/select2.full.min.js') }}"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="{{ asset('public/assets/merchant/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- iCheck 1.0.1 -->
  <script src="{{ asset('public/assets/merchant/plugins/iCheck/icheck.min.js') }}"></script>
  <script src="{{ asset('public/assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>

  <!-- Page script -->
  <script>
    $(function () {
      // Activate Sidebar Menu
      $("#menu_add_product").closest("li").addClass("active");
      $("#menu_product").closest("li").addClass("active");

      // Initialize Select2 Elements
      $(".select2").select2();

      $(".colorpicker-component").colorpicker();

      $("#category").change(function(){
        var cat_id = $(this).val();
        $.ajax({
          url: 'configProduct',
          data: 'category='+cat_id,
          success: function(result){

            if(result['size']){
              var x;
              var size = result.size['size'].split(",");
              var tempSize = "";
              for (x in size){
                tempSize += "<input type='checkbox' class='minimal' value='"+size[x]+"' name='size[]'><span>&nbsp;"+size[x]+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
              }
              $("#tempSize").html(tempSize);
              $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
              });
            }else{
              $("#tempSize").html("<input type='hidden' value='0' name='size'><span>belum ada pengaturan size</span>");
            }

            if(result['description']){
              var description = result.description['temp_deskripsi'];
                $("#tempDescription").html(description);
              }else{
                $("#tempDescription").html("<input type='hidden' value='0' name='description'><span>belum ada pengaturan deskripsi</span>");
              }
          }
        });
      });

      $("#color").change(function(){
        var col = $(this).children('option:selected').data('kode');
        $("#pallete-color").val(col);
        $(".input-group-addon:first").children().attr("style","background-color:"+col);
      });

      $("#discount_date").daterangepicker({drops: "up"});

      $('[data-toggle="tooltip"]').tooltip();

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });

      function getImageCount () {
        return $('.product-images').size() - 1;
      }

      // Add image
      $('#add-image').on('click', function () {
        var parent = $(this).closest('.row');
        var lastItem = parent.find('.product-images:last');
        var newItem = parent.find('#template-add-image').clone(true, true);

        lastItem.after(newItem);
        // newItem.show();

        newItem.find('input[type="file"]').click();
      });

      $('body').on('change', '.pick-image', function (e) {
        var item = $(this).closest('.product-images');
        var img = item.find('img');
        var reader = new FileReader();
        reader.onload = function (e) {
          img.attr('src', e.target.result);
          item.show();
          if (getImageCount() == 5) {
            $('#add-image').hide();
          }
        }
        reader.readAsDataURL(this.files[0]);
      });

      $('body').on('click', '.delete-image', function (e) {
        $(this).closest('.product-images').remove();
        $('#add-image').show();
      });

      // Submit
      $('#submit').on('click', function () {
        // check that there are minimum of 1 image present
        if (getImageCount() < 1) {
          alert('Harus ada paling tidak 1 gambar!');
        } else {
          $('input[type="submit"]').click();
        }
      });
    });

  </script>
@endsection
