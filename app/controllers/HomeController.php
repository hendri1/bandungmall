<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index(){

		$data_category_parent = Category::where('parent', '=', 0)->orderBy('parent','asc')->orderBy('name','asc')->get();
		$data_category_child = Category::where('parent', '!=', 0)->orderBy('parent','asc')->orderBy('name','asc')->get();
		
		// Session::put("data_category_parent",$data_category_parent);
		// Session::put("data_category_child",$data_category_child);

		$data['data_category_parent'] = $data_category_parent;
		$data['data_category_child'] = $data_category_child;
		
		$data['most_viewed_products'] = Product::where('is_active', '=', 'yes')
							->leftJoin('category as c1', 'c1.id', '=', 'product.category_id')
							->leftJoin('category as c2', 'c2.id', '=', 'c1.parent')
							->select('product.*', 'c1.name as category_name', 'c2.name as category_parent_name')
							->orderBy('product.viewed', 'desc') 
							->take(4)->get();
		
		$data['products'] = Product::where('is_active', '=', 'yes')
							->leftJoin('category as c1', 'c1.id', '=', 'product.category_id')
							->leftJoin('category as c2', 'c2.id', '=', 'c1.parent')
							->select('product.*', 'c1.name as category_name', 'c2.name as category_parent_name')
							->orderBy('product.created_at', 'desc') 
							->take(4)->get();
		$data['banners'] = Banner::all();
		$data['brands'] = Brand::all();
		$data['promotions'] = Promotion::all();
		$data['title'] = 'Home';
		if (!Session::has('jenisKelamin')){
			Session::put("jenisKelamin","wanita");
		}

		return View::make('user.home', $data);
	}

}