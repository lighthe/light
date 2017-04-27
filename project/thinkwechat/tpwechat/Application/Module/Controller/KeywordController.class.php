<?php
namespace Module\Controller;





use Common\Controller\BaseController;
use Common\Model\KeywordModel;

class KeywordController extends BaseController{

    protected $keyword;

    protected $kid;

    public function __init(){


        $name='Addons\\'.MODULE.'\Keyword';

         $this->keyword = new $name;
    }



    public function lists(){


           $fields= m('keyword')->select();

           //dd($fields);

           $this->assign('fields',$fields);

          $this->display();

    }



    public function set(){


        $kid=I('get.kid');


        if(IS_POST){
            $data= I('post.');

            $data['module']=MODULE;

            //区分边上还是添加
            if($kid){

                $data['kid']=$kid;
                $this->kid=$kid;
            }


            $this->store((new KeywordModel()),$data,function ($res){


              $kid=$res['kid'];

                //编辑
                //因为添加是时候没有$this->kid的值
                //所见进行判断

                if($this->kid){

                    $kid=$this->kid;
                }

              $this->keyword->submit($kid);

            });


        }


        //如果有kid的话是编辑
        if($kid){

            $data= m('keyword')->where("kid={$kid}")->find();

            $this->assign('oldData',$data);

            $this->keyword->set($kid);
        }

        $fields=$this->keyword->set();
        $this->assign('fields',$fields);
        $this->display();

    }

    public function del(){

        $kid=I('get.kid');

       m('keyword')->where("kid={$kid}")->delete();
        $this->keyword->del($kid);
    }
}