<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;

class CreateTagTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'Tag', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->string('des');
            $table->string('title');
            $table->timestamps();
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'Tag' );
    }
}