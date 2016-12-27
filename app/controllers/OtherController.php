<?php

class OtherController extends BaseController {

	public function privacyPolicy(){

		return View::make('other/privacy_policy');
	}

	public function termOfUse(){

		return View::make('other/term_of_use');
	}

	public function help(){
		return View::make('user.help');
	}

	public function about(){
		return View::make('other/about');
	}

	public function pagenotfound(){
		return View::make('other/404');
	}
}
