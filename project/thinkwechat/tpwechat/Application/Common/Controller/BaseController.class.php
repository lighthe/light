<?php namespace Common\Controller;

use Think\Controller;

class BaseController extends Controller{

        public function __construct()
        {

            parent::__construct();

            //没有session 说
          if (!session('id')){

            $this->error('请登入！！',u('admin/login/index'));

          }


          //分配公共资源
           $data= m('module')->select();

             foreach ($data as $k=>$v){

                $data[$k]['actions'] =json_decode($v['actions'],true);
             }
             //dd($data);
            $this->assign('_module',$data);



            if(method_exists($this,'__init')){

                $this->__init();
            }
        }

    //1。调用模型和方法
        public function store( model $model,$data, \Closure $callback=null){


            $res= $model->store($data);

            if($res['valid']='success' && $callback instanceof \Closure){

                $callback($res);
            }

            $this->message($res);
        }

        //2.、返回信息
        public function message($res){

            if($res['valid']=='success'){

                $this->success($res['msg']);exit;
            }else{

                $this->error($res['msg']);exit;
            }
        }


}
