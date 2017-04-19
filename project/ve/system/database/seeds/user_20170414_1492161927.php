<?php namespace system\database\seeds;

use houdunwang\database\build\Seeder;

class user extends Seeder {
	//执行
	public function up() {
		//Db::table('news')->insert(['title'=>'后盾人']);
		$model             = new \system\model\User();
		$model['username'] = 'admin';
		$model['password'] = 'kk/2hI1G116QhlUppoBtZg==';
		$model['token']    = 'baiducom';
		$model->save();
	}

	//回滚
	public function down() {
		Schema::truncate( 'user' );
	}
}