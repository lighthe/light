<?php namespace system\database\migrations;

use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;

class video extends Migration {
	//执行
	public function up() {
		Schema::create( 'video', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->timestamps();
			$table->string( 'title' )->comment( '视频标题' );
			$table->string( 'path' )->comment( '视频地址' );
			$table->integer( 'lesson_id' )->comment( '课程编号' );
		} );
	}

	//回滚
	public function down() {
		Schema::drop( 'video' );
	}
}