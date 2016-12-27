<?php

class InfoController extends BaseController {

	public function getIndex(){

		$info_data = Session::get('info_data');

		if($info_data ===NULL){
			return Redirect::to('/');
		}
		else{
			Session::put('info_data', NULL);

			return View::make('info/info')->with('info_data', $info_data);
		}
	}

	public function getInfo(){

		$info_data = Session::get('info_data');

		if($info_data ===NULL){
			return Redirect::to('/');
		}
		else{
			Session::put('info_data', NULL);

			return View::make('user.info')->with('info_data', $info_data);
		}
	}
}
