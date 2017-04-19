<?php

namespace app\admin\controller;

 use system\model\Lesson as Model;

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

        return view( 'post', compact( 'model', 'tags' ) );
    }


}