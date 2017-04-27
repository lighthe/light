<?php
namespace Home\Controller;




use Common\Controller\HomeController;
use Home\Model\LoginModel;

class  LoginController extends  HomeController {


    //模版载入
    public function login(){
        $this->display();
    }



        //支付页面登入
    public function loginAjax(){
        if(IS_AJAX){
            //获取数据
            $data=I('post.');
            //发送数据到模型
            $res=(new LoginModel())->login($data);
            //返回比对
            if($res['valid']){


                //将session里的数据加入数据库
                $this->AddSessionData();
                $this->unSession();
                $this->success($res['msg'],u('Home/index/index'));
            }
            //错误提示
            $this->error($res['msg']);
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