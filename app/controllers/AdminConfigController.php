<?php

class AdminConfigController extends BaseController {

	
	public function getIndexColour(){

		$data['error_code'] = Session::get('error_code');

		$colour = new Colour();
		$data['colours'] = $colour->getAll();
		return View::make('admin/configColour',$data);
	}

	public function doInsertConfigColour(){

		$nama = Input::get('nama');
		$kode = Input::get('kode');

		$colour = new Colour();
		$data['colour'] = Colour::where('nama', '=', $nama)->first();
		if(count($data['colour']) > 0){
			return Redirect::to('admin/configColour')->with('error_code', "Nama warna sudah ada");
		}
		$col = $colour->insertColour($nama,$kode);
		
		return Redirect::to('admin/configColour');
	}

	public function getIndexEditColour(){

		$colour_id = Input::get('id');

		$colour = new Colour();
		$data['colour'] = Colour::where('id', '=', $colour_id)->first();
		return View::make('admin/editColour',$data);
	}

	public function doEditConfigColour(){

		$id = Input::get('id');
		$nama = Input::get('nama');
		$kode = Input::get('kode');

		$colour = new Colour();
		$col = $colour->editColour($id,$nama,$kode);
		
		return Redirect::to('admin/configColour');
	}

	public function doDeleteConfigColour(){

		$id = Input::get('id');

		$col = Colour::where('id', '=', $id);
		$col->delete();
		
		return Redirect::to('admin/configColour');
	}

	public function getIndexSize(){

		$data['error_code'] = Session::get('error_code');

		$size = new Size();
		$data['sizes'] = $size->getAll();

		$category = new Category();
		$data['categories'] = $category->getAllWithRoot();
		return View::make('admin/configSize',$data);
	}

	public function doInsertConfigSize(){

		$category = Input::get('category');
		$nama = Input::get('nama');
		$size = Input::get('size');

		$in_size = new Size();
		$data['size'] = Size::where('nama', '=', $nama)->first();
		if(count($data['size']) > 0){
			return Redirect::to('admin/configSize')->with('error_code', "Nama size sudah ada");
		}
		$siz = $in_size->insertSize($category,$nama,$size);
		
		return Redirect::to('admin/configSize');
	}

	public function getIndexEditSize(){

		$size_id = Input::get('id');

		$size = new Size();
		$data['size'] = Size::where('id', '=', $size_id)->first();

		$category = new Category();
		$data['categories'] = $category->getAllWithRoot();
		return View::make('admin/editSize',$data);
	}

	public function doEditConfigSize(){

		$id = Input::get('id');
		$category = Input::get('category');
		$nama = Input::get('nama');
		$size = Input::get('size');

		$ed_size = new Size();
		$data['size'] = Size::where('nama', '=', $nama)
								->where('id','!=',$id)
								->first();
		if(count($data['size']) > 0){
			return Redirect::to('admin/configSize')->with('error_code', "Nama size sudah ada");
		}
		$col = $ed_size->editSize($id,$category,$nama,$size);
		
		return Redirect::to('admin/configSize');
	}

	public function doDeleteConfigSize(){

		$id = Input::get('id');

		$col = Size::where('id', '=', $id);
		$col->delete();
		
		return Redirect::to('admin/configSize');
	}

	public function getIndexDescription(){

		$data['error_code'] = Session::get('error_code');

		$description = new Description();
		$data['descriptions'] = $description->getAll();

		$category = new Category();
		$data['categories'] = $category->getAllWithRoot();
		return View::make('admin/configDescription',$data);
	}

	public function doInsertConfigDescription(){

		$category = Input::get('category');
		$nama = Input::get('nama');
		$description = explode(",",Input::get('description'));
		$satuan = Input::get('satuan');
		
		$temp_description = "";
		foreach($description as $val){
			$temp_description .= "
			<label>$val</label>
			<div class='input-group'>
			<input type='text' class='form-control' name='description[]' placeholder='Masukkan $val' required/>
			<input type='hidden' class='form-control' name='jenis_description[]' value='$val'/>
			<input type='hidden' class='form-control' name='satuan[]' value='$satuan'/>
			<span class='input-group-addon'>$satuan</span>
			</div>
			<br/>
			";
		}

		$in_Description = new Description();
		$data['description'] = Description::where('nama', '=', $nama)->first();
		if(count($data['description']) > 0){
			return Redirect::to('admin/configDescription')->with('error_code', "Nama Description sudah ada");
		}
		$siz = $in_Description->insertDescription($category,$nama,Input::get('description'),$satuan,$temp_description);
		
		return Redirect::to('admin/configDescription');
	}

	public function getIndexEditDescription(){

		$description_id = Input::get('id');

		$description = new Description();
		$data['description'] = Description::where('id', '=', $description_id)->first();

		$category = new Category();
		$data['categories'] = $category->getAllWithRoot();
		return View::make('admin/editDescription',$data);
	}

	public function doEditConfigDescription(){

		$id = Input::get('id');
		$category = Input::get('category');
		$nama = Input::get('nama');
		$description = explode(",",Input::get('description'));
		$satuan = Input::get('satuan');

		$temp_description = "";
		foreach($description as $val){
			$temp_description .= "
			<label>$val</label>
			<div class='input-group'>
			<input type='text' class='form-control' name='description[]' placeholder='Masukkan $val' required/>
			<input type='hidden' class='form-control' name='jenis_description[]' value='$val'/>
			<input type='hidden' class='form-control' name='satuan[]' value='$satuan'/>
			<span class='input-group-addon'>$satuan</span>
			</div>
			<br/>
			";
		}

		$ed_Description = new Description();
		$data['description'] = Description::where('nama', '=', $nama)
								->where('id','!=',$id)
								->first();
		if(count($data['description']) > 0){
			return Redirect::to('admin/configDescription')->with('error_code', "Nama Description sudah ada");
		}
		$col = $ed_Description->editDescription($id,$category,$nama,Input::get('description'),$satuan,$temp_description);
		
		return Redirect::to('admin/configDescription');
	}

	public function doDeleteConfigDescription(){

		$id = Input::get('id');

		$col = Description::where('id', '=', $id);
		$col->delete();
		
		return Redirect::to('admin/configDescription');
	}

}
