<?php namespace Common\Controller;


use Think\Controller;

class BaseController extends Controller {


        public function __construct()
        {
            parent::__construct();

            $field= m('module')->select();
            //dd($field);
            foreach ($field as $k=>$v){

                $field[$k]['actions']=json_decode($v['actions'],true);

            }
           //dd($field);
            $this->assign('_module',$field);

            if(method_exists($this,'__init'))
            {
                $this->__init();
            }

            /**
             * 1.判读登入页面
             *  session
             */

                if( !session('id')){

                   $this->error('请登入！！',u('admin/login/index'));
                }

        }

            //这里我们要用回调函数!
    public function store(model $model,$data,\Closure $callback= null){

              $res=$model->store($data);
              //dd($res);die;
              if($res['valid']='success'  && $callback instanceof \Closure){

                  $callback($res);
              }
              $this->message($res);
        }

        public function message($res){

                if($res['valid']=='success'){
                    $this->success($res['msg']);exit;
                }else{
                    $this->error($res['msg']);exit;
                }

        }

}
