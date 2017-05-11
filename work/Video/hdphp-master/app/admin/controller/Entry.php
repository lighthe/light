<?php namespace app\admin\controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/17 0017
 * Time: 上午 10:50
 */
//这个干什么用？
use houdunwang\request\Request;

class Entry {



    public function index(){
        //这个相当于把Service里的代码写到这里
         \User::auth();
        return view();
    }


    //登入
    public function login(){

        if(IS_POST){
             //调用Service里的login
             \User::login(Request::post());
             //成功提示
            message('登入成功','','success');
        }
        return View();
    }
}