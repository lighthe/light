<?php namespace Admin\Controller;


use Common\Model\LoginModel;
use Think\Controller;

class LoginController extends Controller
{


    public function index()
    {
        /**
         * 登入
         */

        if (IS_POST) {


            $res = (new LoginModel())->pass();

            if ($res['valid'] == 'success') {
                $this->success($res['msg'], u('admin/index/index'));
                die;
            }
            $this->error($res['msg']);
            die;
        }
        $this->display();
    }


    public function code()
    {
        /**
         * 加载验证吗！
         */
        $Verify = new \Think\Verify();
        $Verify->entry();
    }

    public function del(){
        session(null);
        $this->success('退出登入成功！',u('admin/login/index'));
    }
}
