<?php
namespace Common\Model;



class LoginModel extends BaseModel{


    protected $pk='id';

    protected $tableName='user';

    protected $_validate=[
      ['user','require','用户名不能为空'],
      ['password','require','用户密码不能为空'],
      ['code','require','验证码不能为空'],
    ];

    public function pass(){

        //1.获取数据！
        $data=I('post.');
        $user=$data['user'];
        $code=$data['code'];
        $password= md5($data['password']);

        //2.自动验证
        if (!$this->create()){
            // 对数据进行验证
           return ['valid'=>'error','msg'=>$this->getError()];
        }
        //3.验证码比对！
         $jiGuo= $this->check_verify($code);

        if (!$jiGuo){
            return ['valid'=>'error','msg'=>'验证码不正确!'];
        }

        //4.数据库比对数据
        $res=m('user')->where("user='{$user}'")->where("password='{$password}'")->find();
        //走到这里说明账户密码错误！
         if(!$res){
            return ['valid'=>'error','msg'=>'帐号密码错误！'];

              }

          //5.存入session值登入到后台页面！
            session('id',$res['id']);
            session('user',$res['user']);

      return['valid'=>'success','msg'=>'登入成功！'];

    }


    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }


}