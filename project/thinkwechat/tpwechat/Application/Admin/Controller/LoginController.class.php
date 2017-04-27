<?php namespace Admin\Controller;




use Common\Model\LoginModel;
use Think\Controller;

class LoginController extends Controller{



    public function index(){
        /**
         * 1.验证post提交向模型提交数据
         *
         */
        if(IS_POST){
            //2.模型的返回值进行判断？
              $res= (new LoginModel())->pass();

              if($res['valid']=='success'){
                  $this->success('登入成功',u('admin/index/index'));die;
              }
              $this->error($res['msg']);
        }


        $this->display();
    }

    //验证码加载
    public function code(){

        $Verify =     new \Think\Verify();
// 验证码字体使用 ThinkPHP/Library/Think/Verify/ttfs/5.ttf
        $Verify->fontttf = '5.ttf';
        $Verify->entry();
    }
     //退出登入
    public function del(){

       session(null);
       $this->success('用户退出成功！',u('admin/login/index'));
    }

}
