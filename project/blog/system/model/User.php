<?php namespace system\model;

use houdunwang\model\Model;

class User extends Model
{
	//数据表
	protected $table = "user";

	/**
	 * 登录
	 */
	public function login ()
	{
        $yonHu=Db::table('user')->get();
        $yonHu= current($yonHu);
             $password=$yonHu['password'];
//             p($password);
             $username=$yonHu['username'];
                $uid=$yonHu['uid'];
           $miMa=Crypt::encrypt($_POST['password']);
//           p($miMa);die;

//		p($_POST);die;
		//1.接受数据【用户名、密码、验证码】
		//2.验证是否为空
		Validate::make( [
			[ 'username' , 'isnull' , '用户名不能为空' , 3 ],
			[ 'password' , 'isnull' , '密码不能为空' , 3 ],
//			[ 'code' , 'captcha' , '验证码不正确' , 3 ],
		] );
		//3.跟数据库比对是否正确
		//dd($password);die;
		//$obj->index()
		if($password!=Crypt::encrypt($_POST['password']))
		{
			//能走到这里说明返回null，就是说在数据库找不到数据
			//将错误信息存储到Model模型类中的error属性中
			//这样在控制器中就可以通过getError方法来获取错误
            return ['valid'=>false,'message'=>'账号或密码错误'];
		}
//		$data = $data->toArray();
		//p($data);die;
		//能走到这里说明可以正常查询到数据
		//echo 2;die;
		//var_dump($data);
		//5.存入session
		//$_SESSION['uid'] = $data['uid'];
		Session::set('uid',$uid);
        Session::set('username',$username);
		//返回
        return ['valid'=>true,'message'=>'登录成功'];
	}
}