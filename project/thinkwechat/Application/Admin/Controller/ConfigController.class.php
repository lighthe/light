<?php
 namespace Admin\Controller;

 use Common\Controller\BaseController;
 use Common\Model\ConfigModel;

 class ConfigController extends BaseController {




     public function index(){

         if(IS_POST){
                $data=I('post.');
                $data['id']=1;
                $this->store((new ConfigModel()),$data);
         }
            $field=m('config')->find(1);
            $this->assign('field',$field);
            $this->display();
     }

 }