<?php namespace system\service\user;

/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
use houdunwang\session\Session;
use system\model\User as UserModel;

//服务功能类
class User {
	public function auth() {
		if ( $uid = Session::get( 'uid' ) ) {
			v( 'user', Db::table( 'user' )->find( $uid ) );

			return true;
		}
		go( u( 'admin.entry.login' ) );
	}

	/**
	 * 管理员登录
	 *
	 * @param $post
	 *
	 * @return bool
	 */
	public function login( $post ) {
		if ( empty( $post['username'] ) || empty( $post['password'] ) ) {
			message( '帐号或密码不能为空', '', 'error' );
		}
		$user = UserModel::where( 'username', $post['username'] )->first();
		if ( empty( $user ) ) {
			message( '用户不存在', '', 'error' );
		}
		$password = Crypt::encrypt( $post['password'], $user['token'] );
		if ( $password != $user['password'] ) {
			message( '密码输入错误', '', 'error' );
		}
		Session::set( 'uid', $user['id'] );

		return true;
	}
}