<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;

class lesson extends Migration {
    //执行
	public function up() {
		Schema::create( 'lesson', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('title')->comment('课程标题');
			$table->integer('tag_id')->comment('标签编号');
			$table->string('pic')->comment('预览图片');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'lesson' );
    }
}