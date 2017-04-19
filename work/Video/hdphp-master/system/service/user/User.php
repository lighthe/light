<?php namespace system\service\user;
/** .-------------------------------------------------------------------
* |  Software: [HDPHP framework]
* |      Site: www.hdphp.com
* |-------------------------------------------------------------------
* |    Author: 向军 <2300071698@qq.com>
* |    WeChat: aihoudun
* | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
* '-------------------------------------------------------------------*/

use houdunwang\crypt\Crypt;
use houdunwang\db\Db;
use houdunwang\session\Session;

use system\model\User as UserModel;


//服务功能类
class User {
	//构造函数
	public function __construct() {
	}


	//登入验证
	public function auth() {

        if($uid = Session::get( 'uid' )){
            //将数据存入v函数方便调用
            v('user',Db::table('user')->find($uid));
            return true;
        }
        go(u('admin/entry/login'));
	}
    //登入验证
	public function login($post){

            //为账号密码空的验证
           if(empty($post['username']) || empty($post['password'])){
               message('账号密码不能为空!','','error');
           }
            //账号不存在的验证
           $user = UserModel::where('username',$post['username'])->first();
           if (empty($user)){
               message('用户不存在','','error');
           }
            //密码验证
            $password=  Crypt::encrypt($post['password'],$user['token']);
            if($password!=$user['password']){
            message('密码输入错误','','error');
            }
            Session::set('uid',$user['id']);
            return true;
    }
}