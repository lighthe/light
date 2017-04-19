<?php

namespace  Home\Model;




use Admin\Model\BaseModel;

class SignInModel extends BaseModel {


    protected $pk='uid';

    protected $tableName='user';

    protected $_validate=[
        ['username','require','用户名不能为空'],
        ['password','require','密码不能为空'],
        ['code','require','验证码不能为空'],
    ];





    //登入
    public function signIn($data){

        $username=$data['username'];
        $code = $data['code'];
        //自动验证
        if (!$this->create()){
            return ['valid'=>0, 'msg'=> $this->getError()];
        }
          //验证码比对
         $res=$this->check_verify($code);
        if (!$res){
            return ['valid'=>0,'msg'=>'验证码不正确！'];die;
        }

        //用户重名验证
        $find = m('user')->where("username='{$username}'")->find();
        if ($find){
            return ['valid'=>0,'msg'=>'亲你的用户名已经被注册啦'];die;
        }
        //密码加密
        $data['password']= md5($data['password']);
        //注册
        $this->add($data);
        return ['valid'=>1,'msg'=>'注册成功'];
    }

    //验证码检测
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }



}