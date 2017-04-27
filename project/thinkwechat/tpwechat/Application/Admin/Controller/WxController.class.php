<?php namespace Admin\Controller;


use Common\Controller\BaseController;
use Common\Model\ConfigModel;


class WxController extends BaseController {



    public function set(){


            if(IS_POST){

                $data=I('post.');
                $data['id']=1;
                $res=$this->store(new ConfigModel(),$data);

                if($res['valid']=='success'){

                    $this->success('修改配置成功');die;
               }


            }

            $data=m('config')->find(1);

        $this->assign('field',$data);
        $this->display();
    }


}
