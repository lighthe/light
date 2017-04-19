<?php
namespace Home\Controller;



use Common\Controller\HomeController;
use Home\Model\SignInModel;

class SignInController extends HomeController {



    //用户注册模版
    public function signIn(){
        $this->display();
    }


    //退出登入
    public function signOut(){
        if(IS_AJAX){
            session(null);
            $this->success('亲请慢走!',u('Home/index/index'));
     }
    }





   //ajax注册提示
    public function signInAjax(){

        if (IS_AJAX){
            //用户注册信息
            $data= I('post.');
            //调用模型
           $res = (new SignInModel())->signIn($data);
           //验证
           if ($res['valid']){
               $this->success($res['msg'],u('Home/Login/login'));die;
           }
           //错误提示
           $this->error($res['msg']);die;
        }
    }

    //验证码
    public function code(){
        $config =    array(
            'fontSize'    =>    100,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify =     new \Think\Verify($config);
        $Verify->entry();
    }


}