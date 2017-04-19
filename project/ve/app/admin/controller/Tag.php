<?php namespace app\admin\controller;

use houdunwang\request\Request;
use system\model\Tag as Model;

/**
 * 标签管理
 * Class Tag
 * @package app\admin\controller
 * @author hdxj
 */
class Tag {
	public function __construct() {
		\User::auth();
	}

	//标签列表
	public function lists() {
		$model = new Model();
		$data  = $model->get();

		return view( 'lists', compact( 'data' ) );
	}

	//保存数据
	public function post() {
		$id    = Request::get( 'id' );
		$model = $id ? Model::find( $id ) : new Model();
		if ( IS_POST ) {
			$model['title']       = Request::post( 'title' );
			$model['description'] = Request::post( 'description' );
			$model->save();
			message( '保存成功', u( 'lists' ) );
		}

		return view( 'post', compact( 'model' ) );
	}
}















