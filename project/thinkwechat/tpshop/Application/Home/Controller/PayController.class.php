<?php

namespace Home\Controller;




use Common\Controller\HomeController;
use Home\Model\AddressModel;


class PayController extends HomeController{


    //错误信息
    public function __init(){
        if (!$_SESSION['_uid']){
            redirect(u('Home/error/index'));
        }

    }



    //载入模版
    public function index(){

        $uid =$_SESSION['_uid'];
        //配置信息
        $headconf=[
            'title'=>'付款页',
            'css'=>['account'],
            'js'=>['list','account'],
        ];
        $this->assign('headconf',$headconf);

        //调用商品信息
         $goodlist= $this->getlist();

         $this->assign('goodlist',$goodlist);

        //调用地址信息
        $adderData =  $this->address($uid,'');
        $this->assign('adderData',$adderData);

        $this->display();
        }

        //需要修改库存
        //将用户的购买信息存入数据库
        //将购物车对应的货号清除
        //成功提示
        public function orderAjax(){
                if(IS_AJAX){
                    $ader =  I('post.ader'); //调用主键id对应的地址
                    if($ader){

                        $dizhi = $this->address('',$ader);
                        //获取用户所购买的信息
                        $list   = $this->getlist();

                        $arr=[];
                        foreach ($list['goods'] as $k=>$v){

                            $arr[]=[
                                'gid'=>$v['id'],
                                'num'=>$v['num'],
                                'glid'=>$v['options']['glid'],
                            ];
                        }
                        //库存处理
                        $this->inventory($arr);
                        //购物车处理
                        $this->romveCart();
                        //订单处理
                        $this->orderList($dizhi,$list);
                        //成功提示
                        $this->success('正在付款中:亲^-^！',u('Home/pay/orderIndex'));
                    }else{
                        $this->error('没有收货地址，我该怎么送啊?');
                    }

                }
        }




     //存货处理
    public function inventory($arr){
                foreach ($arr as $k=>$v){
                    //得到这个库存
                   $inven= m('goods_list')->where("gid={$v['gid']} and combine='{$v['glid']}'")->find();
                   //减去购买的值
                   $jian = $inven['inventory']-$v['num'];
                   //将值存回数据库
                    m('goods_list')->where("gid={$v['gid']} and combine='{$v['glid']}'")->setField('inventory',$jian);
                }
    }



    //将购物车对应的数据移除
    public function romveCart(){
        if($_SESSION['_uid']){
            $lists= $_SESSION['list'];
            //拆分数组
            $lists = explode(',',$lists);
            //将购物车的里的对应商品删除
            foreach ($lists as $k) {
                m('cart')->where("caid={$k}")->delete();
            }
            $this->returnToSession();
        }
    }


    //存入订单
    public function orderList($dizhi,$list){
        //........订单表
        foreach ($list['goods'] as  $k=>$v){
            $total += $v['total']; //商品小计
            $all +=$v['num'];  //商品数量

            $data=[
                'number'=>$list['usr'].'-'.$_SESSION['_username'].'-'.time(), //订单号
                'total'=>$total, //小计
                'time'=>time(),  //时间
                'remark'=>'请发货',      //提醒
                'status'=>'未付款',    //订单状态
                'ader'=>$dizhi['ader'], //地址的id
                'num'=>$all,           //数量
                'uid'=>$list['usr'],       //用户ID
            ];

        }
         //存入订单表
        $oid =  m('order')->add($data);
        //将id存入session
        session('oid',$oid);
         //...............订单列表
        foreach ($list['goods'] as $kk=>$vv){
                //找到商品对应的货品组合
            $goodList=  m('goods_list')->where("gid='{$vv['id']}'and combine='{$vv['options']['glid']}'")->find();

            $orderlist=[
                'quantity'=>$vv['num'],  //商品的数量
                'subtotal'=>$vv['total'], //商品的小计
                'gid'=>$vv['id'],  //商品的Id
                'oid'=> $oid,  //订单列表对应的订单号
                'glid'=> $goodList['glid'], //商品的组合Id
                'glnumber'=>$goodList['number'], //商品的组合
            ];
            //填入数据库
                m('order_list')->add($orderlist);
        }

    }



        //获取选中的商品信息
        public function getlist(){

         $data = $this->returnToSession();

            //获取要购买的物品内容
            $lists= $_SESSION['list'];
            //用户id
            $user = $_SESSION['_uid'];
            //拆分数组
            $lists = explode(',',$lists);
            //重新组合数组
            $array=[];
            foreach ($lists  as $k){
                foreach ($data['goods']as $kk=>$vv){
                 if ($k==$kk){
                     $array[$kk]=$vv;
                 }
                }
            }

            //得到想要的数组
            $newArr=[];
            foreach ($array as $a=>$b){
                //得到总价
                $total +=$b['total'];
                //得到总数
                $totalrows +=$b['num'];
                //得到合理的数组
                $newArr=[
                    'total'=>$total,
                    'usr'=>$user,
                    'total_rows'=>$totalrows,
                    'goods'=>$array
                ];
            }
           // dd($newArr);
                return $newArr;
        }


    /**
     * @param $uid 调用用户的所有地址不需要是请填空
     * @param $ader 主键ID对应的地址不需要是请填空
     * @return mixed   返回 所有地址 或 主键ID对应的地址
     */
        public function address($uid,$ader){
            //调用用户的所有地址
            if($uid){
                //找到用户对应的地址信息
                $diZhi =  m('useraddress')->where("uid={$uid}")->select();
            }
            //主键ID对应的地址
            if ($ader){
                $diZhi =  m('useraddress')->where("ader={$ader}")->find();
            }
            return $diZhi;
        }

        //ajax存入被选中的货品
        public function listAjax(){
            if(IS_AJAx){
                $id =  substr(I('post.id'),'0','-1') ;
                $_SESSION['list']=$id;
                $this->success('亲您要付款啦！',u('Home/pay/index'));
            }

        }





         //ajax的编辑和添加
        public function addressAjax(){

            if(IS_AJAX){
                //获取数据
                $data = I('post.');
                //调用模型
                 $res=(new AddressModel())->addDizhi($data);
                //判断
                if($res['valid']==1){
                    //添加信息
                      echo json_encode($res,JSON_UNESCAPED_UNICODE);die;

                }elseif($res['valid']==2){
                    //修改信息
                    echo json_encode($res,JSON_UNESCAPED_UNICODE);die;

                }elseif($res['valid']==3){
                     //错误信息
                        echo json_encode($res,JSON_UNESCAPED_UNICODE);die;
                }
            }

        }


        //获取数据
        public function editAjax(){

                if(IS_AJAX){
                   $ader= I('post.ader');

                   $send= m('useraddress')->where("ader={$ader}")->find();

                    //拆分 数组 地址
                    $send['place']= explode(' ',$send['place']) ;

                   $this->ajaxReturn($send);
                }
        }


        //支付完成页面
        public function orderIndex(){

              $oid=  session('oid');
            //配置信息
            $headconf=[
                'title'=>'支付成功页',
                'css'=>['index'],
                'js'=>['index'],
            ];
            $this->assign('headconf',$headconf);
            //在订单列表里找到
          $data =  m('order')->where("oid={$oid}")->find();
         // dd($data);
          $this->assign('PayData',$data);
            $this->display();
        }
}





