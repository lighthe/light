<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;

class CreateUser extends Migration {
    //执行
	public function up() {
		Schema::create( 'user', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            //要回滚一下
            $table->string('password');
            $table->string('username');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'user' );
    }
}