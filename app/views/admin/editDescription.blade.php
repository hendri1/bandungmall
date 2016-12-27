@extends('admin.templates.layout')


@section('content')
  <section class="content-header">
    <h1>
      Edit Template Desciption
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-6 editDesciptionWrap">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Edit Desciption</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{URL::to('admin/configDescription/doEditConfigDescription')}}" method="post">
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
                      <option value="{{$category->id}}" data-keterangan="Deskripsi {{$category->name}} {{$arr_category_parent[$category->parent]}}" {{$category->id == $description->category_id ? 'selected':''}}>{{$category->name}} - {{$arr_category_parent[$category->parent]}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="nama">Nama Desciption</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Description" value="{{$description->nama}}" readonly/>
                </div>
                <div class="form-group">
                  <label for="Description">Desciption <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Masukkan macam-macam Description dipisahkan dengan koma. Contoh : panjang lengan,lingkar dada,lingkar pinggang"></i></label>
                  <textarea name="description" class="form-control" id="description" placeholder="Masukkan Description" required>{{$description->deskripsi}}</textarea>
                  <input type="hidden" name="id" value="{{$description->id}}"/>
                </div>
                 <div class="form-group">
                  <label for="satuan">Satuan Description <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Masukkan hanya satu satuan description. Contoh : cm"></i></label>
                  <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Masukkan Satuan Description" value="{{$description->satuan}}"/>
                </div>
                <div align="right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Edit</button>
                </div>
              </form> 
          </div><!-- /.box-body -->
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
@endsection
@section('javascript')

   <script type="text/javascript">
   $(function(){
    $("#menu_config").closest("li").addClass("active");
    $("#menu_config_description").closest("li").addClass("active");

    $("#category").change(function(){
      $("#nama").val($(this).children('option:selected').data("keterangan"));
    });
   });
  </script>
@endsection