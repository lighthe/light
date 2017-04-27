<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;

class tag extends Migration {
    //执行
	public function up() {
		Schema::create( 'tag', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
			$table->string('title')->comment('标题');
			$table->string('description')->comment('标签描述');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'tag' );
    }
}