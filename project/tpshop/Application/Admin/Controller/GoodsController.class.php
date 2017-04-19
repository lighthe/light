<?php

namespace Admin\Controller;




use Admin\Model\CategoryModel;
use Admin\Model\GoodsModel;
use Common\Controller\BaseController;

class GoodsController extends BaseController{


    public $db;

    public function __init(){

       $this->db  = new GoodsModel();
    }

    //首页数据
    public function index(){
        //分页数据
        $data=$this->makePage('goods',11,'time',desc);

       $this->assign('oldData',$data);
        $this->display();
    }


    //添加数据
    public function add(){

            if(IS_POST){

                $data=I('post.');

                  $res=$this->db->addGoods($data);
                  if ($res['valid']=='success'){

                      $this->success($res['msg'],u('admin/goods/index'));die;
                  }
                    $this->error($res['msg']);die;
            }
        //分类数据
        $cateData= (new CategoryModel())->getCate();
        $this->assign('cateData',$cateData);
        //所属品牌数据
        $brandData=$this->db->logoData();
        $this->assign('brandData',$brandData);
        $this->display();

    }



    //编辑商品数据
    public function edit(){
         //获取商品id号

        $gid=$_GET['gid'];

//>>>>>>>>>>>>>>>>旧数据>>>>>>>>>>>>>>>>
            //商品详情表和商品表数据
            $oldData=M('goods')->alias('g')
                ->join('__GOODS_DETAIL__ d ON g.gid=d.gid')
                ->where("g.gid={$gid}")
                ->find();
               $oldData['big']= explode('|',$oldData['big']);
              $this->assign('oldData',$oldData);


       //商品属性数据
            //1.获取$oldData的tid值
            $tid=$oldData['tid'];
            //2.获取属性的列表数据
           $attrData= m('type_attr')->where("tid={$tid} and class=0")->select();
            $this->assign('attrData',$attrData);
           foreach ($attrData as $n=>$m){

                     $attrData[$n]['tavalue']=explode(',',$m['tavalue']);
           }
            $this->assign('attrData',$attrData);

        //获取所有属性和规格的gtvalue数据
           $hasAttr= m('goods_attr')->where("gid={$gid}")->getField('gtvalue',true);

            $this->assign('hasAttr',$hasAttr);

        //5.获取规格属性
           $specData=m('type_attr')->alias('ta')
                    ->join('__GOODS_ATTR__ ga ON ta.taid=ga.taid')
                    ->where("ga.gid={$gid} and class=1")
                    ->select();

           foreach ($specData as $j=>$u ){
               $specData[$j]['tavalue'] = explode(',',$u['tavalue']);

           }
            $this->assign('specData',$specData);

            //获取分类表数据
            $cateData=(new CategoryModel())->getCate();
            $this->assign('cateData',$cateData);
            //获取logo表里的数据
             $logoData=$this->db->logoData();
            $this->assign('brandData',$logoData);
            $this->display();
    }
    //ajax的数据
    public function ajaxGetSpec(){
            //判断是否是ajax数据
        if(IS_AJAX){
            //得到tid的值
           $tid= I('post.tid');
           //在数据库找到键名tid的值
           $res= m('type_attr')->where("tid={$tid}")->select();
           //将$res里的值转化为数组
            foreach ($res as $k=>$v){
                    $res[$k]['tavalue']= explode(',',$v['tavalue']);
            }
            //ajax返回
            $this->ajaxReturn($res);
        }
    }

    //删除
    public function del(){
        $gid=I('get.gid');
        m('goods')->where("gid={$gid}")->delete();
        m('goods_detail')->where("gid={$gid}")->delete();
        m('goods_attr')->where("gid={$gid}")->delete();
        $this->success('删除成功',u('index'));die;
    }

}