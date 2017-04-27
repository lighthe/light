<?php namespace system\database\migrations;

use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;

class user extends Migration {
	//执行
	public function up() {
		Schema::create( 'user', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->timestamps();
			$table->char( 'username', 20 )->comment( '用户名' );
			$table->string( 'password' )->comment( '密码' );
			$table->string( 'token')->comment( '密钥' );
		} );
	}

	//回滚
	public function down() {
		Schema::drop( 'user' );
	}
}