<?php

class ProductController extends BaseController {

	public function getIndex(){

		$search = Input::get('search');
		$category_id = Input::get('category_id');
		if($category_id <= 10){
			Session::put('jenisKelamin',"wanita");
		} else {
			Session::put('jenisKelamin',"pria");
		}
		
		$brand = Input::get('brand');
		$sort = Input::get('sort');
		$price = Input::get('price');
		$date = Input::get('date');
		$sale = Input::get('sale');

		$data['products'] = Array();

		$category = new Category();

		$product = new Product();

		$data['categories'] = $category->getAll();
		if(isset($category_id)){
			//$data['products'] = $product->getProductByCategoryID($search, $category_id, $sort);
			$data['products'] = Product::where('category_id', '=', $category_id)->paginate(9);
			$data['category'] = Category::where('id', '=', $category_id)->orderBy('parent','asc')->orderBy('name','asc')->first();
			$data['category_parent'] = Category::where('id', '=', $data['category']['parent'])->orderBy('parent','asc')->orderBy('name','asc')->first();
		}
		else if(isset($brand)){
			$data['products'] = $product->getProductByBrand($search, $brand, $sort)->paginate(9);
			$data['product_brand'] = $data['products'][0]->brand_name;
		}
		else if(isset($price)){
			$data['products'] = Product::orderBy('price', $price)->paginate(9);
			$data['price'] = $price;
		}
		else if(isset($date)){
			$data['products'] = Product::orderBy('created_at', $date)->paginate(9);
			$data['date'] = $date;
		}
		else if(isset($sale)){
			$data['products'] = Product::where('discount','!=',0)
							->where('discount_date_start','<=',date('Y-m-d'))
							->where('discount_date_end','>=',date('Y-m-d'))
							->orderBy('discount', $sale)->paginate(9);
			$data['sale'] = $sale;
		}
		else{
			$data['products'] = Product::where('product.name', 'like', '%'.$search.'%')
										->orWhere('product.color', 'like', '%'.$search.'%')
										->orWhere('product.brand', 'LIKE', '%'.$search.'%')
										->paginate(9);
		}
				
		$data['data_category_parent'] = Category::where('parent', '=', 0)->orderBy('parent','asc')->orderBy('name','asc')->get();
		$data['data_category_child'] = Category::where('parent', '!=', 0)->orderBy('parent','asc')->orderBy('name','asc')->get();


		return View::make('user.product', $data);
	}

	public function getPria(){

		$data['products'] = Category::where('parent', '=', '2')->orderBy('parent','asc')->orderBy('name','asc')->get();
		$data['most_viewed_products'] = Product::where('is_active', '=', 'yes')
							->leftJoin('category as c1', 'c1.id', '=', 'product.category_id')
							->where('c1.parent', '=', '2')
							->leftJoin('category as c2', 'c2.id', '=', 'c1.parent')
							->select('product.*', 'c1.name as category_name', 'c2.name as category_parent_name')
							->orderBy('product.viewed', 'desc') 
							->take(4)->get();

		if(Session::has('jenisKelamin')){
			Session::put('jenisKelamin',"pria");
		}

		return View::make('user.pria', $data);
	}

	public function getWanita(){

		$data['products'] = Category::where('parent', '=', '1')->orderBy('parent','asc')->orderBy('name','asc')->get();
		$data['most_viewed_products'] = Product::where('is_active', '=', 'yes')
							->leftJoin('category as c1', 'c1.id', '=', 'product.category_id')
							->where('c1.parent', '=', '1')
							->leftJoin('category as c2', 'c2.id', '=', 'c1.parent')
							->select('product.*', 'c1.name as category_name', 'c2.name as category_parent_name')
							->orderBy('product.viewed', 'desc') 
							->take(4)->get();

		if(Session::has('jenisKelamin')){
			Session::put('jenisKelamin',"wanita");
		}

		return View::make('user.wanita', $data);
	}

	public function searchItem(){
		$keyword = Input::get('keyword');

		$product = new Product();
		$data['products'] = Product::where('name', 'LIKE', '%'.$keyword.'%')
									->orWhere('brand', 'LIKE', '%'.$keyword.'%')
									->get();
		
		if($data['products'] ->isEmpty()){
			$searched_category_id = 3;
		}else {
			$searched_category_id = Product::where('name', 'LIKE', '%'.$keyword.'%')
											->orWhere('brand', 'LIKE', '%'.$keyword.'%')
											->select('category_id')
											->get()
											->take(1);
		}
		$a = json_decode($searched_category_id);
		//echo $a[0];
		//$data['also_searched_products'] = $a[0]->category_id;
		$data['also_searched_products'] = Product::where('is_active', '=', 'yes')
							->leftJoin('category as c1', 'c1.id', '=', 'product.category_id')
							->where('c1.id', '=', $a[0]->category_id)
							->leftJoin('category as c2', 'c2.id', '=', 'c1.parent')
							->select('product.*', 'c1.name as category_name', 'c2.name as category_parent_name')
							->orderBy('product.viewed', 'desc') 
							->take(4)->get();
							
		return View::make('user.search_result', $data);
	}
	
	public function getIndexBrand(){
		
		$data['brands'] = Array();
		
		$sort = Input::get('sort');
		
		//$data['brands'] = DB::table('product')->distinct()->select('brand')->get();
		if($sort == 'desc')
			$data['brands'] = DB::table('product')->distinct()->select('brand')->orderBy('brand', 'desc')->get();
		else
			$data['brands'] = DB::table('product')->distinct()->select('brand')->get();
		
		//print_r($data['brands']);
		
		return View::make('product/brand', $data);
	}

	public function productDetail(){

		//ambil product id di get
		$product_id = Input::get('product_id');
		
		$product = Product::where('id', '=', $product_id)->first();
		
		if($product !=null){
			$product->viewed = $product->viewed+1;
			$product->save();
		}

		$data['product'] = $product;
		$data['product_specs'] = ProductSpec::where('product_id', '=', $product_id)->get();
		$data['product_images'] = ProductImage::where('product_id', '=', $product_id)
														->orderBy('id','asc')
														->get();

		$data['products'] = Product::where('is_active', '=', 'yes')
							->where('product.category_id','=',$product->category_id)
							->where('product.id','!=',$product->id)
							->leftJoin('category as c1', 'c1.id', '=', 'product.category_id')
							->select('product.*', 'c1.id as product_id')
							->orderBy(DB::raw('RAND()'))
							->take(4)->get();		
							
		$data['category'] = Product::where('product.id', '=', $product_id)
							->leftJoin('category as c1', 'c1.id', '=', 'product.category_id')
							->leftJoin('category as c2', 'c2.id', '=', 'c1.parent')
							->select('c1.name as category_name', 'c2.name as category_parent_name', 'c1.id as category_id', 'c2.id as category_parent_id')
							->first();

		return View::make('user.product_detail', $data);
	}
}