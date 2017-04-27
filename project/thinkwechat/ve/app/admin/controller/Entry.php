<?php namespace app\admin\controller;

use houdunwang\request\Request;

class Entry {
	//后台主页
	public function index() {
		\User::auth();

		return view();
	}

	//登录
	public function login() {
		if ( IS_POST ) {
			\User::login( Request::post() );
			message( '登录成功', '', 'success' );
		}

		return view();
	}
}















