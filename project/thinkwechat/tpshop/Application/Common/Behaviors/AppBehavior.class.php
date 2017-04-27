<?php
namespace Common\Behaviors;

include './Application/Common/Common/helper.php';

class AppBehavior extends \Think\Behavior{
    //行为执行入口
    public function run(&$param){

         //dd(session());
        //用户信息
        v('user',session());
    }





}