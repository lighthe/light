<?php
namespace  Admin\Controller;



use Admin\Model\GoodslistModel;
use Common\Controller\BaseController;

class GoodslistController extends BaseController{




    //货品列表
    public function index(){
            //获取gid的值
            $gid=I('get.gid');

            //获取货品表
         $listData= m('goods_list')->where("gid={$gid}")->select();

         $where=[];
         foreach ($listData as $k=>$v){

             $where['gtid']=array('in',$v['combine']);

            $listData[$k]['combine']=  m('goods_attr')->where($where)->getField('gtvalue',true);
         }

        // dd($listData);
            $this->assign('listData',$listData);


//...........//获取货品的数组...........
        $field=  M('type_attr')->alias('ta')->join('__GOODS_ATTR__ ga ON ga.taid= ta.taid')
            ->where("gid={$gid} and ta.class=1")
            ->select();

       // dd($field);
        //将数组归类
        $data=[];
        foreach ($field as $k =>$v){

            $data[$v['taname']][]=$v;
        }


           // dd($data);
        $this->assign('data',$data);
        $this->display();

    }



    //添加货品
    public function add(){

        if(IS_POST){
                //货品信息
                $postdata=I('post.');

//                dd($postdata);die;
                //压入商品ig
              $gid=$postdata['gid'];
                //对postdata['combine']的数据从组
                $strData='';
                foreach ($postdata['combine'] as $n){
                            $strData .=$n.',';
                    $postdata['combine']=substr($strData,0,-1);

                }

                //写入数据库
                $this->store((new GoodslistModel()),$postdata,u('admin/goodslist/index',['gid'=>$gid]));
            }

        }




        //编辑

        public function edit(){



                $gid=I('get.gid');
                $glib= I('get.glid');

        if(IS_POST){

            $postdata=I('post.');
            $inventory=$postdata['inventory'];

                //dd($postdata);die;
         m('goods_list')->where("glid={$glib}")->setField('inventory',$inventory);
         $this->success('操作成功',u('admin/goodslist/index',['gid'=>$gid]));die;
        }


            //货品旧数据
            $oldData=m('goods_list')->where("glid={$glib}")->find();
                $this->assign('oldData',$oldData);

                //获取货品规格旧数据
               $combine=$oldData['combine'];
            $map['gtid']  = array('in',$combine);
            $field=  M('type_attr')->alias('ta')->join('__GOODS_ATTR__ ga ON ga.taid= ta.taid')
                ->where($map)
                ->select();
                 $this->assign('listData',$field);
                  $this->display();

        }


        public function del(){

            $gid=I('get.gid');
            $glid=I('get.glid');

            m('goods_list')->where("glid={$glid}")->delete();
            $this->success('操作成功',u('admin/goodslist/index',['gid'=>$gid]));die;


        }

}