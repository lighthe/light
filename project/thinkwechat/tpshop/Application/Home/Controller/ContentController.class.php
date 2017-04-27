<?php

namespace Home\Controller;



use Common\Controller\HomeController;
use Org\Util\Cart;


class ContentController extends HomeController {



    public function contents(){

        $gid=I('get.gid');


        //关联gid对应的数据
        //这里是规格属性
       $data= m("type_attr")->alias('ta')
           ->join('__GOODS_ATTR__ ga ON ga.taid=ta.taid')
           ->where("gid={$gid} and class=1")
           ->select();

      $content = m('goods')->alias('g')
         ->join('__GOODS_DETAIL__ gd ON g.gid =gd.gid')
         ->where("g.gid={$gid}")
          ->find();


        $content['big']=explode('|',$content['big']);
        //dd($content);
        $this->assign('content',$content);

        //数组归类
        $newdata=[];
       foreach ($data as $k=>$v ){
           $newdata[$v['taname']][]=$v;
       }

       $this->assign('check',$newdata);
        //配置信息
        $headconf=[
            'title'=>'详情页',
            'css'=>['index'],
            'js'=>['list'],
        ];


        $this->assign('headconf',$headconf);

        $this->display();
    }


    public function ajaxGetTotal(){



        if (IS_AJAX){

               $gid= I('post.gid');
            //将字符串的最后一个，去掉
            $combine= substr(I('post.combine'),'0','-1') ;
            //在货品表找到货品

            $returnData= m('goods_list')->where("gid='{$gid}' and combine='{$combine}'")->find();

            //如果数据库没有数据
            if (!$returnData){
                $this->ajaxReturn(['valid'=>0,'total'=>0]);die;
            }

            //如果数据能查到数据但库存为0
            if ($returnData['inventory']==0){
                $this->ajaxReturn(['valid'=>0,'total'=>0]);die;
            }
            //如果数据数据库有数据但库存不为0
            $this->ajaxReturn(['valid'=>1,'total'=>$returnData['inventory']]);die;
        }
    }

    public function ajaxAddCart(){

        if(IS_AJAX){

                //货品id
            $data['glid']   =  $_POST['sd']  =   substr($_POST['sd'],'0','-1');
            //商品id
            $data['id']=$_POST['gid'];
            //购买数量
            $data['num']=$_POST['num'];
            //获取库存总数
            $data['inventory']=$_POST['inventory'];
            //其他参数
            $data['options']=$_POST['option'];

            //查找goods表里的字段为gname,shopprice,pic的值
            $findData=m('goods')->where("gid={$data['id']}")->field('gname,shopprice,pic')->find();
            //dd($findData);
            //
            $data=[
                "id"=>$data['id'],       //商品id
                "num"=>$data['num'],          // 商品数量
                "name"=>$findData['gname'],      //商品名字
                "price"=>$findData['shopprice'],        //商品价格
                "options"=>[                      //商品规格
                    "options"=> $data['options'],
                    "pic"=>$findData['pic'],       //商品图片
                    "inventory"=>$data['inventory'],
                    "glid"=> $data['glid'],
                ],
                ];

                //dd($data);die;
                 //如果用户已经登入
              if($_SESSION['_uid']){
                //将用户所选的加入数据库
                $this->AddCartData($data);
                }else{
                  //实例化购物车类 将数组传入
                  (new Cart())->add($data);
              }
                //向前台返回数据
                echo 1;die;
        }

    }


}