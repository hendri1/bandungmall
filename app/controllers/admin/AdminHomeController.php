<?php

class AdminHomeController extends BaseController {

	public function getIndex(){
		//return View::make('admin/home');
		return Redirect::to('admin/admin');
	}

	public function getIndexHome(){
		
		$data['transaction_detail_notifications'] = DB::table('transaction_detail_notification')->orderBy('created_at', 'desc')->get();
		$data['transaction_notifications'] = DB::table('transaction_notification')->orderBy('created_at', 'desc')->get();

		return View::make('admin/home', $data);
	}

}
