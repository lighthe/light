<?php

 namespace app\admin\controller;

 use houdunwang\request\Request;
 use system\model\Tag as Model;


 class Tag {
     //登入验证？
     public function __construct() {
         \User::auth();
     }



     public function lists(){
            $model = new Model();
            $data= $model->get();
            //这里的compact函数是什么意思？
            return view( 'lists', compact( 'data' ) ); //这里是什么意思
     }

     public function post(){
          //判断是否的编辑
            $id    = Request::get( 'id' );
             // P($id);
            //判断是否有 没有的话 走添加
           $model =  $id ? Model::find($id): new Model();

            if(IS_POST){
                  //这个要获取post里的数据
                $model['title']   =   Request::post('title');
                $model['des']   = Request::post('des');
                $model->save();

                message( '保存成功', u( 'lists' ) );
            }
         return view( 'post', compact( 'model' ) );
     }

 }
