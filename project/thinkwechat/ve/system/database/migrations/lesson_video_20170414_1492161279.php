<?php namespace system\database\migrations;

use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;

class lesson_video extends Migration {
	//执行
	public function up() {
		Schema::create( 'lesson_video', function ( Blueprint $table ) {
			$table->integer( 'tag_id' );
			$table->integer( 'lesson_id' );
		} );
	}

	//回滚
	public function down() {
		Schema::drop( 'lesson_video' );
	}
}