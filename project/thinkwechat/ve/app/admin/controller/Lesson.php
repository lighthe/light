<?php namespace app\admin\controller;

use houdunwang\request\Request;
//起别名
use system\model\Lesson as Model;
use system\model\LessonVideo;
use system\model\Video;

/**
 * 课程管理
 * Class Lesson
 * @package app\admin\controller
 */
class Lesson {

	public function __construct() {
		//这个什么意思？
		$d = get_defined_constants( true );
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
			$insertId             = $model->save();
			$id                   = $id ?: $insertId;
			//添加视频标签
			LessonVideo::addVideo( Request::post( 'tid' ), $id );
			//添加课程视频
			$videos = json_decode( Request::post( 'videos' ), true );
			Video::addVideo( $id, $videos );
			message( '保存成功', u( 'lists' ) );
		}
		//获取所有标签
		$tags = \system\model\Tag::get();

		return view( 'post', compact( 'model', 'tags' ) );
	}
}















