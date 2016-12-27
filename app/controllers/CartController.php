<?php

class CartController extends BaseController {

	public function getIndex(){

		if(Session::has('mycart') && count(Session::get('mycart'))!=0){
			$product = new Product();

			$cartProductID =  array();
			$cart = Session::get('mycart'); 
			foreach ($cart as $id => $qty) {
				array_push($cartProductID,$id);
			}
			$result['cart_data'] = $product->getCartData($cartProductID);
			$result['cart']=$cart;
			$result['user_address'] = UserAddress::where('user_id', '=', Auth::user()->id)->get();

			return View::make('cart/cart',$result);
		}
		else{
			return View::make('cart/cart');
		}
	}


	public function getCart(){
		if(Auth::check()) {
			if(Session::has('mycart') && count(Session::get('mycart'))!=0){
				$product = new Product();

				$cartProductID =  array();
				$cart = Session::get('mycart');

				foreach ($cart as $id => $qty) {
					array_push($cartProductID,$id);
				}
				$result['cart_data'] = $product->getCartData($cartProductID);
				$result['cart']=$cart;
				$result['user_address'] = UserAddress::where('user_id', '=', Auth::user()->id)->get();
				return View::make('user.user_cart', $result);
			}
			else{
				$result['cart_data'] = json_encode ((object) null);
				$result['cart']= array();
				$result['user_address'] = UserAddress::where('user_id', '=', Auth::user()->id)->get();
				return View::make('user.user_cart', $result);
			}
		}
		else return View::make('user/user_login');
		
	}

	public function refreshCart(){
		return Redirect::back();
	}

	public function addToCart(){
		if(Auth::check()) {
			$id = Input::get('product_id');
			$qty = Input::get('quantity');
			$size = Input::get('size');
			
			$cart = Session::get('mycart'); 

			if($qty == 0){
				return Redirect::back()->withErrors(['Mohon diisi jumlah pembelian']);
			}
			// if($size == 0){
			// 	return Redirect::back()->withErrors(['Mohon dipilih ukurannya']);
			// }
			if(!Session::has('mycart')) {
				$cart = array();
				if($qty>0)
					$cart[$id] = $qty;	
			}
			else if(Session::has('mycart') && !isset($cart[$id])){
				if($qty>0)
					$cart[$id] = $qty;
			}
			else if(Session::has('mycart') && isset($cart[$id])){
				if($qty>0)
					$cart[$id] = $cart[$id] + $qty;
			}					
			
			
			Session::put("mycart",$cart);
			$this::countCart($cart);
			
			return Redirect::to('cart');
		}
		else return View::make('user/user_login');
	}

	public function deleteCart(){
		$id = Input::get('product_id');
		$cart = Session::get('mycart');
		if(!Session::has('mycart')) {
			$cart = array();
		} else {
			unset($cart[$id]);
			Session::put("mycart",$cart);	
			$this::countCart($cart);
			$cartProductID = array();
			$prod = new Product();
			if(count($cart)!=0){
				foreach ($cart as $id => $qty) {
					array_push($cartProductID,$id);
				}
				$result['cartData']= $prod->getCartData($cartProductID);
				$result['cart']=$cart;	
			}
		}
				
		return Redirect::to('/cart');			
	}

	public static function countCart($cart){
		$totalQty=0;
		foreach ($cart as $id => $qty) {
				$totalQty +=$qty;
		}		
		Session::put('cartQty',$totalQty);
	}
}
