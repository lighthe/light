<?php   namespace Addons\button;


use Addons\button\Model\ButtonModel;
use Addons\Module;
use houdunwang\wechat\WeChat;


class Site extends Module {

        public function lists(){

            $data= m('button')->select();
           // dd($data);
            $this->assign('field',$data);
            $this->make();
        }


        public function add(){

                    $id=I('get.id');
                    //dd($id);

                 if(IS_POST){
                        //如何判断添加和修改？

                     $data=I('post.');
                     //判断是否是添加和删除！
                     if($id){

                       $data['id']=$id;
                       $data['state']=0;
                     }

                    $this->store((new ButtonModel()),$data,function (){

                        $this->success('操作成功!!',site_url('button.lists'));die;
                    });

                 }


           // a.因为再次进入添加是会报错所有要给判断;
           // b.因为js里没有button的数据 所有在给一个oldData的else加一个button 和 title 数据
            //c.这个及时的添加也不会报错!
            if($id){

                $oldData= m('button')->where("id={$id}")->find();
            }else{
                //默认数据
                $oldData=[
                    'title'=>'',
                    'content'=>'{"button":[]}',
                ];
            }

            $this->assign('oldData',$oldData);
            $this->make();
        }



        public function  send(){
            /**
             * 1.获取id的值，
             * 2.在数据库中找到对应的数据，只取content的值，
             * 3.调用微信接口，
             * 4.将已推送的button数据修改状态的1，将为推送的数据状态修改为0，
             * 5.成功或失败提示!将页面跳回到lists页面！
             */
                $id=I('get.id');
               $data= m('button')->where("id={$id}")->getField('content');
              $res= (new WeChat())->instance('button')->create($data);

                if($res['errcode']==0){

                    m('button')->where("id={$id}")->save(['state'=>1]);
                    m('button')->where("id<>{$id}")->save(['state'=>0]);
                    $this->success('推送成功',site_url('button.lists'));die;
                }else{
                    $this->error($res['errmsg']);die;
                }

        }
}
