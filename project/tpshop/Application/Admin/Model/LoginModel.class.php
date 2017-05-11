<?php namespace Admin\Model;



use Think\Model;

class LoginModel extends Model{


    protected $pk= 'mid';

    protected $tableName= 'username';

    protected $_validate =array(

        array('username','require','用户名不能为空！'),
        array('password','require','密码不能为空！'),
        array('code','require','验证码不能为空！'),
    );


        //自动验证
    public function store($data){

            $PersonUser=$data['username'];
            $PersonCode=$data['code'];
            $Personpass= md5($data['password']);

                 $model= m('username');
                //上次登入的数据
                $oldata=$model->where("username='{$PersonUser}'")->getField('mid,logintime,loginip');
                //账号密码错误判断
                if (!$oldata){
                    return ['valid'=>'error','msg'=>'账户密码不正确！'];die;
                }
                $oldata=current($oldata);
                $lastlogin=[
                    'oldtime'=>$oldata['logintime'],
                    'oldip'=>$oldata['loginip']
                ];

                $model->where("mid={$oldata['mid']}")->setField($lastlogin);

        //自动验证
         if (!$this->create()){

             return ['valid'=>'error','msg'=>$this->getError()];
         }
        //验证吗比对
         $suJu= $this->check_verify($PersonCode);

         if(!$suJu){

             return ['valid'=>'error','msg'=>'验证码不正确！'];die;
         }
            //数据库比对
          $res= $model->where("username='{$PersonUser}' and password='{$Personpass}'")->find();

           //判断
            if($res){
                //存session
                session('username',$res['username']);
                session('mid',$res['mid']);

                //登入login的时间和ip
                $data=[
                    'logintime'=>time(),
                    'loginip'=>get_client_ip(),
                ];

                //将login的时间和ip存入数据库！
               $model->where("mid={$res['mid']}")->setField($data);
               //返回信息
                return ['valid'=>'success','msg'=>'登入成功!']; die;
             }

    }


    //验证码验证
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

}
