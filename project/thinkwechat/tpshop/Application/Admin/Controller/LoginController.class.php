<?php namespace Admin\Controller;





use Admin\Model\LoginModel;
use Think\Controller;

class LoginController extends Controller {



    //登入
    public function index(){


        if(IS_POST){
             $data=I('post.');

             $res=(new LoginModel())->store($data);

             if($res['valid']=='success'){
                 $this->success($res['msg'],u('admin/index/index'));die;
             }
             $this->error($res['msg']);
        }
        $this->display();
    }

    //退出登入
    public function setout(){
        session(null);
        $this->success('退出成功!',u('admin/login/index'));die;
    }



    //验证码
    public function code(){

        $Verify = new \Think\Verify();
        $Verify->entry();
    }
}
