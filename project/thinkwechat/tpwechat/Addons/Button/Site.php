<?php namespace Addons\Button;

use Addons\Button\Model\ButtonModel;
use Addons\Module;

class Site extends Module
{

    public function cate(){


        // dd('我是button后台里的cate方法');
    }


    public function lists(){

        /**
         *
         */

       $data= m('button')->select();

        $this->assign('data',$data);

        $this->make();
    }

    public function add(){

        /**
         * 1.
         */
        if(IS_POST){

             $data= I('post.');

          $this->store(new ButtonModel(),$data,function (){

              $this->success('操作成功！:-)',site_url('button.lists'));die;

          });

        }

        $this->make();
    }



}