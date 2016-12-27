	<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

date_default_timezone_set("Asia/Jakarta");

View::composer('user.templates.layout', function($view){
    $data['data_category_parent'] = Category::where('parent', '=', 0)->get();
	$data['data_category_child'] = Category::where('parent', '!=', 0)->get();
    $view->with($data);
});

View::composer('layout.frontend', function($view){
    $data['data_category_parent'] = Category::where('parent', '=', 0)->get();
	$data['data_category_child'] = Category::where('parent', '!=', 0)->get();
    $view->with($data);
});

Route::get('/', 'HomeController@index'); // done
Route::get('home', 'HomeController@index'); // done

Route::get('info', 'InfoController@getInfo');
Route::get('admin', 'AdminAuthController@getIndexLogin'); // done
Route::get('admin/login', 'AdminAuthController@getIndexLogin'); // done
Route::post('admin/login/doLogin', 'AdminAuthController@doLogin'); // done
Route::get('admin/login/doLogout', 'AdminAuthController@doLogout'); // done

// Route::get('tes', function(){return View::make('layout.frontend_new');});

Route::group(array(), function() 
{
	if(AdminHelper::checkLogin()){
		Route::get('admin/home', 'AdminHomeController@getIndexHome'); // done
		Route::get('admin/user', 'AdminUserController@getIndex');
		
		//Route::get('admin/user/doDeleteUser', 'AdminUserController@doDeleteUser');
		
		Route::get('admin/user/transaction', 'AdminUserTransactionController@getIndex');
		Route::get('admin/user/detailTransaction', 'AdminUserTransactionController@detailTransaction');


		Route::get('admin/admin', 'AdminAdminController@getIndex');
		Route::post('admin/admin/doInsertAdmin', 'AdminAdminController@doInsertAdmin');
		Route::get('admin/admin/doDeleteAdmin', 'AdminAdminController@doDeleteAdmin');

		Route::get('admin/merchant', 'AdminMerchantController@getIndex');
		Route::get('admin/merchant/editMerchant', 'AdminMerchantController@getIndexEditMerchant');
		Route::post('admin/merchant/editMerchant/doUpdatePassword', 'AdminMerchantController@doUpdatePassword');
		Route::post('admin/merchant/editMerchant/doUpdateGeneralInformation', 'AdminMerchantController@doUpdateGeneralInformation');
		Route::post('admin/merchant/editMerchant/doUpdatePaymentInformation', 'AdminMerchantController@doUpdatePaymentInformation');
		Route::post('admin/merchant/editMerchant/doUpdateAddressInformation', 'AdminMerchantController@doUpdateAddressInformation');

		Route::get('admin/merchant/editMerchantLogin', 'AdminMerchantController@getIndexEditMerchantLogin');
		Route::post('admin/merchant/editMerchantLogin/doEditMerchantLogin', 'AdminMerchantController@doEditMerchantLogin');
		Route::get('admin/merchant/registration', 'AdminMerchantController@getIndexRegistration');
		Route::get('admin/merchant/doAcceptMerchantRegistration', 'AdminMerchantController@doAcceptMerchantRegistration');
		Route::get('admin/merchant/doDeclineMerchantRegistration', 'AdminMerchantController@doDeclineMerchantRegistration');
		Route::get('admin/merchant/doDeleteMerchant', 'AdminMerchantController@doDeleteMerchant');
		Route::get('admin/merchant/insertMerchantLogin', 'AdminMerchantController@insertMerchantLogin');
		Route::post('admin/merchant/insertMerchantLogin/doInsertMerchantLogin', 'AdminMerchantController@doInsertMerchantLogin');
		Route::post('admin/merchant/doInformMerchant', 'AdminMerchantController@doInformMerchant');

		Route::get('admin/category', 'AdminCategoryController@getIndex');
		Route::get('admin/category/editCategory', 'AdminCategoryController@getIndexEditCategory');
		Route::post('admin/category/doEditCategory', 'AdminCategoryController@doEditCategory');
		Route::post('admin/category/doInsertCategory', 'AdminCategoryController@doInsertCategory');
		Route::get('admin/category/doDeleteCategory', 'AdminCategoryController@doDeleteCategory');

		Route::get('admin/product', 'AdminProductController@getIndex');
		Route::get('admin/product/doDeleteProduct', 'AdminProductController@doDeleteProduct');

		Route::get('admin/coupon', 'AdminCouponController@getIndex');
		Route::get('admin/coupon/editCoupon', 'AdminCouponController@getIndexEditCoupon');
		Route::post('admin/coupon/doEditCoupon', 'AdminCouponController@doEditCoupon');
		Route::post('admin/coupon/doInsertCoupon', 'AdminCouponController@doInsertCoupon');
		Route::get('admin/coupon/doDeleteCoupon', 'AdminCouponController@doDeleteCoupon');

		Route::get('admin/configColour', 'AdminConfigController@getIndexColour');
		Route::get('admin/configColour/editConfigColour', 'AdminConfigController@getIndexEditColour');
		Route::post('admin/configColour/doEditConfigColour', 'AdminConfigController@doEditConfigColour');
		Route::post('admin/configColour/doInsertConfigColour', 'AdminConfigController@doInsertConfigColour');
		Route::get('admin/configColour/doDeleteConfigColour', 'AdminConfigController@doDeleteConfigColour');
		Route::get('admin/configSize', 'AdminConfigController@getIndexSize');
		Route::get('admin/configSize/editConfigSize', 'AdminConfigController@getIndexEditSize');
		Route::post('admin/configSize/doEditConfigSize', 'AdminConfigController@doEditConfigSize');
		Route::post('admin/configSize/doInsertConfigSize', 'AdminConfigController@doInsertConfigSize');
		Route::get('admin/configSize/doDeleteConfigSize', 'AdminConfigController@doDeleteConfigSize');
		Route::get('admin/configDescription', 'AdminConfigController@getIndexDescription');
		Route::get('admin/configDescription/editConfigDescription', 'AdminConfigController@getIndexEditDescription');
		Route::post('admin/configDescription/doEditConfigDescription', 'AdminConfigController@doEditConfigDescription');
		Route::post('admin/configDescription/doInsertConfigDescription', 'AdminConfigController@doInsertConfigDescription');
		Route::get('admin/configDescription/doDeleteConfigDescription', 'AdminConfigController@doDeleteConfigDescription');

		Route::get('admin/transaction/transactionPending', 'AdminTransactionController@getPendingTransaction');
		Route::get('admin/transaction/filterTransactionPending', 'AdminTransactionController@getFilterTransactionPending');
		Route::get('admin/transaction/transactionPaid', 'AdminTransactionController@getPaidTransaction');
		Route::get('admin/transaction/filterTransactionPaid', 'AdminTransactionController@getFilterTransactionPaid');
		Route::get('admin/transaction/transactionUnpaid', 'AdminTransactionController@getUnPaidTransaction');
		Route::get('admin/transaction/filterTransactionUnPaid', 'AdminTransactionController@getFilterUnPaidTransaction');
		Route::get('admin/transaction/doTransactionPayment', 'AdminTransactionController@doTransactionPayment');
		Route::get('admin/transaction/transactionDetail', 'AdminTransactionController@detailTransaction');
		Route::get('admin/transaction/transactionSent', 'AdminTransactionController@getIndexTransactionSent');
		Route::get('admin/transaction/filterTransactionSent', 'AdminTransactionController@getFilterTransactionSent');
		Route::get('admin/transaction/transactionSentDetail', 'AdminTransactionController@getIndexTransactionSentDetail');
		Route::get('admin/transaction/doApproveTransactionDetail', 'AdminTransactionController@doApproveTransactionDetail');
		Route::get('admin/transaction/doRejectTransactionDetail', 'AdminTransactionController@doRejectTransactionDetail');
		Route::get('admin/transactionReport', 'AdminTransactionController@getIndexTransactionReportFinal');
		Route::get('admin/filterTransactionReport', 'AdminTransactionController@getFilterTransactionReportFinal');
		Route::get('admin/transactionReportReject', 'AdminTransactionController@getIndexTransactionReportReject');
		Route::get('admin/filterTransactionReportReject', 'AdminTransactionController@getFilterTransactionReportReject');
		Route::get('admin/transactionReportPending', 'AdminTransactionController@getIndexTransactionReportPending');
		Route::get('admin/filterTransactionReportPending', 'AdminTransactionController@getFilterTransactionReportPending');
		Route::get('admin/generateTransactionReport', 'AdminTransactionController@generateTransactionReport');
		Route::get('admin/banner', 'AdminContentController@getIndexBanner'); // done
		Route::post('admin/banner/doUpdateBanner', 'AdminContentController@doUpdateBanner'); // done
		Route::post('admin/banner/doAddBanner', 'AdminContentController@doAddBanner'); // done
		Route::post('admin/banner/doDeleteBanner', 'AdminContentController@doDeleteBanner'); // done
		Route::get('admin/brands', 'AdminContentController@getIndexBrand'); // done
		Route::post('admin/brands/doUpdateBrand', 'AdminContentController@doUpdateBrand'); // done
		Route::post('admin/brands/doAddBrand', 'AdminContentController@doAddBrand'); // done
		Route::post('admin/brands/doDeleteBrand', 'AdminContentController@doDeleteBrand'); // done
		Route::get('admin/promotions', 'AdminContentController@getIndexPromotion'); // done
		Route::post('admin/promotions/doUpdatePromotion', 'AdminContentController@doUpdatePromotion'); // done
		Route::post('admin/promotions/doDeletePromotion', 'AdminContentController@doDeletePromotion'); // done
	}
});

Route::group(array(), function() 
{
	if(UserHelper::checkLogin()){
		Route::get('user/login', 'UserController@getIndexLogin'); // done
		Route::post('user/login/doLogin', 'UserController@doLogin'); // done
		Route::get('user/login/fb', 'LoginFacebookController@login'); // done
		Route::get('user/login/fb/callback', 'LoginFacebookController@callback'); // done
		Route::get('user/login/google', 'LoginGoogleController@loginWithGoogle'); // done
		Route::get('user/doLogout', 'UserController@doLogout'); // done

		Route::get('user/register', 'UserController@getIndexRegister'); // done
		Route::post('user/register/doRegister', 'UserController@doRegister'); // done
		Route::get('user/register/doRegister/activate_account/{activation_code}', array('as' => 'account-activation', 'uses' => 'UserController@activateAccount')); // done
		Route::get('user/forgotPassword', 'UserController@getIndexForgotPassword');
		Route::post('user/forgotPassword/generateForgotPasswordCode', 'UserController@generateForgotPasswordCode');
		Route::get('user/forgotPassword/resetPassword/{reset_password_code}', array('as' => 'reset-password', 'uses' => 'UserController@resetPassword'));
		Route::post('user/forgotPassword/resetPassword/doResetPassword', 'UserController@doResetPassword');

		Route::get('user/home', 'UserController@getIndexHome'); // done
		Route::get('user/myAccount', 'UserController@getIndexAccount');//done
		Route::post('user/myAccount/doUpdateReferral', 'UserController@doUpdateReferral');
		Route::get('user/info', 'UserController@getInfo');//done
		Route::get('user/address', 'UserController@getAddress');//done
		Route::get('user/bank', 'UserController@getBank');//done
		Route::get('user/thankyou', 'UserController@getThankYou');//done
		Route::post('user/editInfo', 'UserController@doEditInfo');//done
		Route::post('user/myAccount/doAddAddress', 'UserController@doAddAddress');//done
		Route::get('user/myAccount/deleteAddress', 'UserController@deleteAddress');//done
		Route::post('user/myAccount/editAddress', 'UserController@doEditAddress');//done
		Route::post('user/myAccount/doAddBank', 'UserController@doAddBank');//done
		Route::get('user/myAccount/deleteBank', 'UserController@deleteBank');//done
		Route::post('user/myAccount/editBank', 'UserController@doEditBank');//done
		Route::get('user/transactionHistory', 'UserController@getIndexHistory');//done
		Route::get('user/transactionPayment', 'UserController@transactionPayment');
		Route::get('user/doTransactionPayment', 'UserController@doTransactionPayment');
		Route::get('user/doTransactionReceived', 'UserController@doTransactionReceived');
		//Route::get('user/transactionHistory', 'UserController@getIndexOrder');
		Route::get('user/transactionHistoryDetail', 'UserController@getIndexOrderDetail');
		Route::get('user/order', 'UserController@getIndexOrder');
		Route::get('user/orderDetail', 'UserController@getIndexOrderDetail');
		Route::get('user/downline', 'UserController@getIndexDownline');
		Route::get('user/income', 'UserController@getIndexIncome');
		Route::get('user/cashout', 'UserController@getIndexCashout');
		Route::post('user/cashout/doCashout', 'UserController@doCashout');

		Route::get('product', 'ProductController@getIndex');//done
		Route::get('product/search', 'ProductController@searchItem');//done
		Route::get('productDetail', 'ProductController@productDetail');//done
		Route::get('pria', 'ProductController@getPria');//done
		Route::get('wanita', 'ProductController@getWanita');//done

		Route::get('cart', 'CartController@getCart');//done
		Route::get('cart/refresh', 'CartController@refreshCart');//done
		Route::post('cart/add', 'CartController@addToCart');//done
		Route::get('cart/delete', 'CartController@deleteCart');//done
		Route::get('checkout', 'CheckoutController@getCheckout');//done
		Route::get('checkout/getAddress', 'CheckoutController@getAddress');//done
		Route::get('checkout/getCost', 'CheckoutController@getCost');//done
		Route::get('checkout/checkCoupon', 'CheckoutController@checkCoupon');//done
		Route::get('checkout/setCoupon', 'CheckoutController@setCoupon');//done
		Route::get('checkout/getAccountBank', 'CheckoutController@getAccountBank');//done
		Route::post('/checkout/doCheckoutFinal', 'CheckoutController@doCheckoutFinal');//done
		Route::get('checkout/confirmation', 'CheckoutController@getIndexConfirmation');
		Route::post('user/doInsertPaymentConfirmation', 'UserController@doInsertPaymentConfirmation');
		Route::post('/checkout/shipping/getCost', 'CheckoutController@getCost');
		Route::post('/checkout/doCheckout', 'CheckoutController@doCheckout');
	}
});

Route::get('privacyPolicy', 'OtherController@privacyPolicy');//done
Route::get('termOfUse', 'OtherController@termOfUse');//done
Route::get('help', 'OtherController@help');//done
Route::get('about', 'OtherController@about');//done
Route::get('404', 'OtherController@pagenotfound');//done

Route::get('merchant/register', 'MerchantController@getIndexRegister'); // done
Route::get('merchant/doRegister/activate_account/{activation_code}', array('as' => 'merchant-account-activation', 'uses' => 'MerchantController@activateAccount')); // done
Route::post('merchant/doRegister', 'MerchantController@doRegister'); // done
Route::get('merchant', 'MerchantController@getIndexLogin'); // done
Route::get('merchant/login', 'MerchantController@getIndexLogin'); // done
Route::post('merchant/login/doLogin', 'MerchantController@doLogin'); // done
Route::get('merchant/login/doLogout', 'MerchantController@doLogout'); // done

Route::get('merchant/forgotPassword', 'MerchantController@getIndexForgotPassword');
Route::post('merchant/forgotPassword/generateForgotPasswordCode', 'MerchantController@generateForgotPasswordCode');
Route::get('merchant/forgotPassword/resetPassword/{reset_password_code}', array('as' => 'reset-password-merchant', 'uses' => 'MerchantController@resetPassword'));
Route::post('merchant/forgotPassword/resetPassword/doResetPassword', 'MerchantController@doResetPassword');

Route::group(array(), function() 
{
	if(MerchantHelper::checkLogin()){
		Route::get('merchant/info', 'MerchantController@getIndexInfo'); // done
		Route::get('merchant/addProduct', 'MerchantController@getIndexAddProduct'); // done
		Route::get('merchant/configProduct', 'MerchantController@getConfigProduct'); // done
		Route::post('merchant/addProduct/doAddProduct', 'MerchantController@doAddProduct'); // done
		Route::get('merchant/editProduct', 'MerchantController@getIndexEditProduct'); // done
		Route::post('merchant/editProduct/doEditProduct', 'MerchantController@doEditProduct'); // done
		Route::post('merchant/editProduct/doDeleteImage', 'MerchantController@doDeleteImage'); // done
		Route::get('merchant/productList', 'MerchantController@getIndexProductList'); // done
		Route::get('merchant/deleteProduct/doDeleteProduct', 'MerchantController@doDeleteProduct'); // done
		Route::get('merchant/generateReport', 'MerchantController@generateReportMerchantSales'); 
		Route::get('merchant/report', 'MerchantController@getIndexReport');
		Route::get('merchant/reportDetail', 'MerchantController@getIndexReportDetail');
		Route::get('merchant/message', 'MerchantController@getIndexMessage');
		Route::get('merchant/order', 'MerchantController@getIndexOrder'); // done
		Route::get('merchant/order/doTransactionSent', 'MerchantController@doTransactionSent'); // done
		Route::get('merchant/orderDetail', 'MerchantController@getIndexOrderDetail');
		Route::get('merchant/orderDetail/doAcceptOrder', 'MerchantController@doAcceptOrder');
		Route::get('merchant/orderDetail/doDeclineOrder', 'MerchantController@doDeclineOrder');
		Route::get('merchant/acceptedOrder', 'MerchantController@getIndexAcceptedOrder'); // done
		Route::get('merchant/acceptedOrderDetail', 'MerchantController@getIndexAcceptedOrderDetail');
		Route::post('merchant/acceptedOrderDetail/doInsertResi', 'MerchantController@doInsertResi');
		Route::get('merchant/acceptedOrder', 'MerchantController@getIndexAcceptedOrder'); // done
		Route::post('merchant/doUpdatePassword', 'MerchantController@doUpdatePassword'); // done
		Route::post('merchant/doUpdateGeneralInformation', 'MerchantController@doUpdateGeneralInformation'); // done
		Route::post('merchant/doUpdatePaymentInformation', 'MerchantController@doUpdatePaymentInformation'); // done
		Route::post('merchant/doUpdateAddressInformation', 'MerchantController@doUpdateAddressInformation'); // done
	}
});

// Route::get('hashmake', function(){ 
// 	return Hash::make('qwe'); 
// });

// Route::get('tespdf', function(){
// 	$html = View::make('other.tes');

// 	$data['link'] = 'asd';

// 	return PDF::loadView('other.tes', $data)->stream();
// });

// Route::get('tesCom', function(){
// 	$mlm = new Mlm();
// 	$upline_list = array();
// 	$upline = 26;
// 	for($i=0; $i<5; $i++){
// 		$temp_upline = $mlm->getUpline($upline);
// 		if(empty($temp_upline)) break;
// 		else{
// 			$upline = $temp_upline->id;
// 			array_push($upline_list, $temp_upline);
// 		}
// 	}

// 	foreach($upline_list as $list){
// 		echo $list->email.'<br>';
// 	}

// 	$fees = FeeRate::all()->toArray();
// 	echo $fees[0]['percentage'];
// });


App::missing(function($exception)
{
	$data["message"] = "Halaman yang Anda cari tidak dapat kami temukan";
	$data["code"] = 404;
    return Response::view('other.404', $data, 404);
});

// App::error(function($exception, $code) {
//  	switch ($code) {
//  		case 403:
// 			$data["message"] = "Anda tidak diperbolehkan untuk melakukan itu";
// 			$data["code"] = 403;
//  			return Response::view('other.404', $data, 403);

// 		case 404:
// 			$data["message"] = "Halaman yang Anda cari tidak dapat kami temukan";
// 			$data["code"] = 404;
// 		    return Response::view('other.404', $data, 404);

// 		case 500:
// 			$data["message"] = "Maaf, server kami sedang ada gangguan. Coba lagi dalam beberapa saat";
// 			$data["code"] = 500;
// 			Log::error($exception);
// 		    return Response::view('other.404', $data, 500);

// 		default:
// 			$data["message"] = "Maaf, terjadi kesalahan. Akan kami perbaiki secepatnya :)";
// 			$data["code"] = $code;
// 		    return Response::view('other.404', $data, $code);
// 	}
	
// });
