<?php


namespace Home\Model;


use Admin\Model\BaseModel;

class LoginModel extends  BaseModel {




    protected $pk='uid';

    protected $tableName='user';

    protected $_validate=[
        ['username','require','用户名不能为空'],
        ['password','require','密码不能为空'],
        ['code','require','验证码不能为空'],
    ];

    //用户登入
    public function login($data){
        //自动验证
        if (!$this->create()){
            // 如果创建失败 表示验证没有通过 输出错误提示信息
           return ['valid'=>0,'msg'=>$this->getError()];
        }
        //账号密码比对
        $userPassWord  =  md5($data['password']);
        $userName= $data['username'];
        $code =$data['code'];
        //验证码比对
        $codeRes = $this->check_verify($code);
        //这里要取反
        if(!$codeRes){
            return ['valid'=>0,'msg'=>'验证码不正确'];die;
        }
        $find = m('user')->where("username='{$userName}' and password='{$userPassWord}'")->find();
        //验证成功提示
        if (!$find){
            //错误提示
            return ['valid'=>0,'msg'=>'你的账号密码出错啦！'];die;

        }
        session('_username',$find['username']);
        session('_uid',$find['uid']);

        return ['valid'=>1,'msg'=>'登入成功!'];
    }

    //验证码检测
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }



}