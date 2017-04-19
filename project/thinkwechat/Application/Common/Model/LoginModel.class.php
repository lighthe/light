<?php namespace Common\Model;




class LoginModel extends BaseModel{

    protected $pk='id';
    protected $tableName='user';
    protected $_validate=[
       ['user','require','用户名不能为空'],
       ['password','require','密码不能为空']
    ];


    public function pass(){


        if (!$this->create()){

            // 如果创建失败 表示验证没有通过 输出错误提示信息
            return ['valid'=>'error','msg'=>$this->getError()];
        }
        //验证码验证
        $res = $this->check_verify($_POST['code']);

        if (!$res) {

            return ['valid'=>'error','msg'=>'验证码错误！'];
        }

        $person=I('post.');
        $personUser=$person['user'];
        $personPassword= md5($person['password']);
        $data=m('user')->where("user='{$personUser}'")->where("password='{$personPassword}'")->find();

        if(is_null($data)) {
            return ['valid'=>'error','msg'=>'请输入正确账户和密码'];

        }
        session('id',$data['id']);
        session('user',$data['user']);
        return ['valid'=>'success','msg'=>'登入成功'];
    }


    /**
     * 验证验证码！
     */
    public function check_verify($code, $id = '')
    {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
}
