<?php
 namespace Addons\text;


 use Addons\Module;
 use Addons\text\Model\TextContentModel;

 class Keyword extends Module{


     public function set($kid= ''){

            if($kid){
                //dd($kid);
                $contentData= m('text_content')->where("kid={$kid}")->find();
               // dd($contentData);
                $this->assign('contentData',$contentData);
            }
         return $this->fetch('Addons/Text/View/set.html');
     }


        public function submit($kid){

            //dd($kid);
             $data=I('post.');
            //dd($data);
            //$data['kid']
            if(m('text_content')->where("kid={$kid}")->find()){

                //dd(1);die;
                $data['id']=m('text_content')->where("kid={$kid}")->getField('id');
            }


            $data['kid']=$kid;
            //dd($data);die;
           // $this->store()
            $this->store((new TextContentModel()),$data,function (){

                $this->success('操作成功^_^',u('model/keyword/lists',['mo'=>MODULE]));die;
            });
        }


     public function del($kid){

         (new TextContentModel())->where("kid={$kid}")->delete();
         $this->success('删除成功',u('model/keyword/lists',['mo'=>MODULE]));
     }

 }
