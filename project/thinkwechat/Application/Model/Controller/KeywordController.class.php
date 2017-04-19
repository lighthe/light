<?php namespace Model\Controller;



use Common\Controller\BaseController;
use Common\Model\KeywordModel;

class KeywordController extends BaseController{

        protected $keyword;
        protected $kid;

        public function __init(){

            //dd($_GET);
           $name= '\Addons\\'.MODULE.'\Keyword';
            $this->keyword = new $name;

        }

        public function lists(){

            //dd($_GET);

            $data=m('keyword')->select();
                //dd($data);
            $this->assign('field',$data);

            $this->display();
        }

        public function set(){
            //dd($_GET);die;
            //1.设置kid用来判读添加或删除
            $kid=I('get.kid');
            //dd($kid);
            if(IS_POST){
                $data=I('post.');
                //dd($data);die;
                $data['module']=MODULE;
                //dd($data);
                //2.用来是否是编辑或删除
                if($kid){
                   $data['kid']=$kid;
                   $this->kid=$kid;
                }
                //3.store以后的代码不在执行,所以要用回调函数！！！
               $this->store((new KeywordModel()),$data,function ($res){

                    $kid= $res['data'];
                    //dd(1);
                    //dd($kid);die;
                    //dd(2);
                    //判读进行编辑
                  if($this->kid){
                      $kid=$this->kid;
                     // dd($kid);die;
                  }

                   $this->keyword->submit($kid);
               });

            }

            //获取旧数据
            if($kid){

                $oldData=m('keyword')->find($kid);
                //dd($oldData);die;
                $this->assign('oldData',$oldData);
                $this->keyword->set($kid);
            }

            $fields=$this->keyword->set();
            $this->assign('fields',$fields);
            $this->display();
        }


        public function del(){

            //  dd($_GET);
             $kid=I('get.kid');
            (new KeywordModel)->where("kid={$kid}")->delete();
            $this->keyword->del($kid);
        }

}
