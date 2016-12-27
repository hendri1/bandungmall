@extends('admin.templates.layout')

@section('content')
  <section class="content-header">
    <h1>
      Daftar Category
    </h1>
  </section>
  
<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">List Category</h3>
          </div><!-- /.box-header -->
          @if(!empty($error_code))
            <span style="margin-left:10px; color:red">* {{$error_code}}</span>
          @endif
          <div class="box-body">
            <table style="text-transform: capitalize;" id="listCategory" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
				  <th scope="col">Nama</th>
				  <th scope="col">Category Parent</th>
          <th scope="col">Commision</th>
				  <th scope="col">Edit</th>
				  <th scope="col">Hapus</th>     
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $category)
				  <tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					@if(isset($category->parent_name))
					  <td>{{$category->parent_name}}</td>
					@else
					  <td>Root</td>
					@endif
          <td>{{$category->commision}} %</td>
					<td><a href="{{URL::to('admin/category/editCategory?id='.$category->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
					<td><a data-toggle="modal" data-target="#modalDelete" href="#" onclick="confirmation('category/doDeleteCategory?id=<?php echo $category->id; ?>','{{$category->name}}');"><span class="glyphicon glyphicon-remove"></span></a></td>
				  </tr>
				@endforeach
              </tbody>
            </table>
            <button style="float:right" class="btn btn-success" id="addCategory"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Category</button>
          </div><!-- /.box-body -->
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-xs-6 tambahCategoryWrap hide">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Tambah Category</h3>
            <button style="float:right" class="btn btn-danger" id="closeAddCategory"><i class="fa fa-close"></i></button>
          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{URL::to('admin/category/doInsertCategory')}}" method="post">
                      <div class="form-group">
                          <label for="adminid">Category Parent</label>
                          <select name="category_parent" id="category_parent" class="form-control" required>
                            <option value="0">Root</option>
                            @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->parent_name}} {{$category->name}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="adminpwd">Category Child</label>
                          <input type="text" name="category" class="form-control" id="category" placeholder="Masukkan caregory baru" required/>
                      </div>
                      <div align="right">
                        <button type="submit" class="btn btn-default">Tambah</button>
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
          <h4 class="modal-title">Hapus Category?</h4>
        </div>
        <div class="modal-body">
          <p>Yakin ingin menghapus category <span id="userAdmin"></span>?</p>
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
 $(function () {
      // Activate Sidebar Menu
      $("#menu_category").closest("li").addClass("active");
      $("#listCategory").DataTable({
       "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
      });

      $("#addCategory").click(function(){
        $('.tambahCategoryWrap').removeClass("hide");
      });
      $("#closeAddCategory").click(function(){
        $('.tambahCategoryWrap').addClass("hide");
      });

    });
  function confirmation(link,name){
    $("#userAdmin").html(name);
    $("#okDelete").click(function(){
      location.href = link;
    });
    return false;
  }
</script>
@endsection