<?php
/**
 * Created by PhpStorm.
 * User  : wubin
 * Tel   : 18535741189
 * Wechat: 290646986
 * Date  : 2017/2/16
 * Time  : 下午4:30
 */

namespace app\admin\controller;


class Common
{
	public function __construct ()
	{
		//var_dump(Session::get('name'));die;
		//登录验证
		//if(!isset($_SESSION)){
		if(!Session::get('uid')){
			//跳转到登录页面
			go('Admin.Login.index');
		}

		if(method_exists($this,'__init')){

            $this->__init();
        }
	}


}