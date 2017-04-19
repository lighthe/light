<?php namespace Admin\Controller;



use Common\Controller\BaseController;
use Common\Model\ConfigModel;


class ConfigController extends BaseController {



    public function index(){

        if(IS_POST){
            $data=I('post.');
             //加主键。执行编辑
            $data['id']=1;
             $this->store(new ConfigModel(),$data);
        }

        $data=m('config')->find(1);
        $this->assign('field',$data);
        $this->display();
    }



}
