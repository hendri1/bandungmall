@extends('admin.templates.layout')

@section('content')
  <section class="content-header">
    <h1>
      Daftar Template Size
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">List Size</h3>
          </div><!-- /.box-header -->
          @if(!empty($error_code))
            <span style="margin-left:10px; color:red">* {{$error_code}}</span>
          @endif
          <div class="box-body">
            <table style="text-transform: capitalize;" id="listSize" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Deskripsi Size</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
              {{--*/ $x = 1 /*--}}
              @foreach ($sizes as $size)
                <tr>
                  <td>{{$x}}</td>
                  <td>{{$size->nama}}</td>
                  <td>{{$size->size}}</td>
                  <td><a href="{{URL::to('admin/configSize/editConfigSize?id='.$size->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
          <td><a data-toggle="modal" data-target="#modalDelete" href="#" onclick="delete_confirm('configSize/doDeleteConfigSize?id={{$size->id}}','{{$size->nama}}');"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
                {{--*/ $x++ /*--}}
              @endforeach
              </tbody>
            </table>
            <button style="float:right" class="btn btn-success" id="addSize"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Size</button>
          </div><!-- /.box-body -->
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-xs-6 tambahSizeWrap hide">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Tambah Size</h3>
            <button style="float:right" class="btn btn-danger" id="closeAddSize"><i class="fa fa-close"></i></button>
          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{URL::to('admin/configSize/doInsertConfigSize')}}" method="post">
                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category" id="category" class="form-control" required>
                    <option value="0">Pilih Kategori</option>
                    {{--*/ 
                        $arr_category = array(); 
                        $arr_category_parent = array();
                    /*--}}
                    @foreach($categories as $category)
                    {{--*/ 
                        if($category->parent == 0){
                          $arr_category[] = $category->id;
                          $arr_category_parent[$category->id] = $category->name;
                        }
                    /*--}}
                    @endforeach
                    @foreach($categories as $category)
                      @if(!(in_array($category->id, $arr_category)))
                      <option value="{{$category->id}}" data-keterangan="Size {{$category->name}} {{$arr_category_parent[$category->parent]}}">{{$category->name}} - {{$arr_category_parent[$category->parent]}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="nama">Nama Size</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Size" readonly/>
                </div>
                <div class="form-group">
                  <label for="size">Deskripsi Size <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Masukkan macam-macam size dipisahkan dengan koma. Contoh : S,M,L"></i></label>
                  <textarea name="size" class="form-control" id="size" placeholder="Masukkan Deskripsi Size" required></textarea>
                </div>
                <div align="right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Tambah</button>
                </div>
              </form> 
          </div><!-- /.box-body -->
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
  <div class="modal fade" id="modalDelete" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Size?</h4>
        </div>
        <div class="modal-body">
          <p>Yakin ingin menghapus <span id="namaSize"></span>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="okDelete">Ya</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('javascript')
  

   <script type="text/javascript">
   $(function(){
    $("#menu_config").closest("li").addClass("active");
    $("#menu_config_size").closest("li").addClass("active");
    $("#listSize").DataTable({
       "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
    });
    $("#addSize").click(function(){
      $('.tambahSizeWrap').removeClass("hide");
    });
    $("#closeAddSize").click(function(){
      $('.tambahSizeWrap').addClass("hide");
    });

    $("#category").change(function(){
      $("#nama").val($(this).children('option:selected').data("keterangan"));
    });
   });

    function delete_confirm(link,size){
      $("#namaSize").html(size);
      $("#okDelete").click(function(){
        location.href = link;
      });
      return false;
    }
  </script>
@endsection