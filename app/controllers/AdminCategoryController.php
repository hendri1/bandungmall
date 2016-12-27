<?php

class AdminCategoryController extends BaseController {

	public function getIndex(){

		$data['error_code'] = Session::get('error_code');

		$category = new Category();
		$data['categories'] = $category->getAllWithRoot();
		return View::make('admin/category', $data);
	}

	public function getIndexEditCategory(){

		$data['error_code'] = Session::get('error_code');

		$category_id = Input::get('id');

		$category = new Category();
		$data['categories'] = $category->getAllWithRoot();
		$data['category'] = Category::where('id', '=', $category_id)->first();

		return View::make('admin/editCategory', $data);
	}

	public function doEditCategory(){

		$category_id = Input::get('category_id');
		$category_parent = Input::get('category_parent');
		$category = Input::get('category');
		$category_commision = Input::get('category_commision');
		
		$cat = Category::find($category_id);
		$cat->parent = $category_parent;
		$cat->commision = $category_commision;
		$cat->name = $category;
		$cat->save();

		return Redirect::to('admin/category');
	}

	public function doInsertCategory(){

		$category_parent = Input::get('category_parent');
		$category = Input::get('category');

		$cat = new Category();
		$data['cat'] = Category::where('parent', '=', $category_parent)
								->where('name', '=', $category)
								->first();
		if(count($data['cat']) > 0){
			return Redirect::to('admin/category')->with('error_code', "Category sudah ada");
		}
		$cat->parent = $category_parent;
		$cat->name = $category;
		$cat->save();

		return Redirect::to('admin/category');
	}

	public function doDeleteCategory(){

		$category_id = Input::get('id');

		$data_category = Category::find($category_id);
		$data_category->delete();

		return Redirect::to('admin/category');
	}
}
