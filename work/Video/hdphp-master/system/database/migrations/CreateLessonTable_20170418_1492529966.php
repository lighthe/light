<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;

class CreateLessonTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'Lesson', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->string('title');
            $table->string('pic');
            $table->integer('tag_id');
            $table->timestamps();
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'Lesson' );
    }
}