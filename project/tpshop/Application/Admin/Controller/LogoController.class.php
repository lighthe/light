<?php

namespace Admin\Controller;





use Admin\Model\LogoModel;
use Common\Controller\BaseController;

class LogoController extends BaseController{




    //品牌首页加载
    public function index(){
        //logo数据


       //分页数据
        $data=$this->makePage('logo','8','lid');

        //数据分配
       $this->assign('data',$data);
       $this->display();
    }



    //添加
    public function add(){

        if(IS_POST){
                $data=I('post.');
                //logo添加
            $this->store((new LogoModel()),$data,u('admin/logo/index'));
        }
        $this->display();
    }

    //修改
    public function edit(){

        $lid = I('get.lid');

        //修改
        if(IS_POST){
          $data= I('post.');
          $data['lid']=$lid;
           $this->store((new LogoModel()),$data,u('admin/logo/index'));
        }

            //查找旧数据
            $oldData=m('logo')->where("lid={$lid}")->find();
            //分配数据
            $this->assign('oldData',$oldData);
             $this->display();
    }

    //删除
    public function del(){

        $lid = I('get.lid');
        m('logo')->where("lid={$lid}")->delete();
        $this->success('删除成功:-)',u('admin/logo/index'));die;
    }

}