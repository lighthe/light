<?php namespace Addons\Text;





use Addons\Module;
use Addons\Text\Model\TextContentModel;

class Keyword extends Module{





    public function set($kid=''){

            //如果有kid的话是编辑
        if($kid){

            $data=m('text_content')->where("kid='{$kid}'")->find();

            $this->assign('contentData',$data);

        }

    return  $this->fetch('Addons/Text/View/set.html');

    }


    public function submit($kid){


            $data=I('post.');

            if (m('text_content')->where("kid={$kid}")->find()){

                    $data['id']=m('text_content')->where("kid={$kid}")->getField('id');
            }

            $data['kid']=$kid;

            $this->store(new TextContentModel(),$data,function (){

               $this->success('操作成功!',u('module/keyword/lists',['mo'=>MODULE]));die;
            });
    }


    public function del($kid){

        m('text_content')->where("kid={$kid}")->delete();

        $this->success('删除成功!',u('module/keyword/lists',['mo'=>MODULE]));
    }


}
