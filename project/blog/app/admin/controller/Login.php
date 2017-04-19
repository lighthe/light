<?php namespace app\admin\controller;

use houdunwang\model\Model;
use system\model\User;

class Login{
    //动作
    public function index(){
    	//var_dump($_SESSION);
    	//echo u('admin.index.index');die;
    //此处书写代码...
       $data=Db::table('user')->get();
       $data=current($data);
       $pass=$data['password'];


		if(IS_POST)
		{
			//V->C->M->数据库
			$res = (new User())->login();
            if($res['valid']){
                //说明执行成功
                message( $res['message'], u('admin.index.index'), $type = 'success', $timeout = 2 );
			}
            message( $res['message'], $redirect = 'back', $type = 'error', $timeout = 2 );
		}
		return view();
    }

	/**
	 * 验证码
	 */
    public function code()
	{
		Code::num(1)->make();
	}
}
