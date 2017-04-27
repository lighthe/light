<?php

namespace Common\Controller;



use Org\Util\Cart;
use Think\Controller;

class HomeController extends Controller {


    public function __construct()
    {
        parent::__construct();
        //自己构造的一个类型自动执行的方法
        if(method_exists($this,'__init')){
            $this->__init();
        }
       // dd($_SESSION);

        $this->getCartData();
        //获取session里购物车信息
        $cartData= $_SESSION['cart'];
        $this->assign('cartData',$cartData);

    }


    //取出购物车里的数据
    public function getCartData(){

       //dd($_SESSION);
        //获取信息
        $fromData= $this->returnToSession();
        //dd($fromData);
        $this->assign('fromData',$fromData);
    }



    //存入数据库
    public function AddCartData($data)
    {

        $uid = $_SESSION['_uid'];

        if($uid && $data){

            $data['total']= $data['num']*$data['price'];

            if($oldData=m('cart')->where("uid={$uid} and name='{$data['name']}' and glid='{$data['options']['glid']}'and gid={$data['id']}")->find()){
                $oldNum = $oldData['num'];
                $oldData['num'] = $oldNum + $data['num'];
                $oldTotol    = $oldData['xiaoji'];
                $oldData['xiaoji']=$oldTotol +$data['total'];
                m('cart')->where("uid={$uid} and name='{$data['name']}' and glid='{$data['options']['glid']}'and gid={$data['id']}")->save($oldData);
            }else {
                $newdata = [
                    'gid' => $data['id'], //商品id
                    'num' => $data['num'], //数量
                    'name' => $data['name'], //商品名字
                    'danjia' => $data['price'], //商品单价
                    'glid' => $data['options']['glid'], //库存组合id
                    'xiaoji' =>  $data['total'], //商品小计
                    'pic' => $data['options']['pic'], //商品图片
                    'uid' => $uid, //用户id
                    'key' => ' ',  //编号
                    'inventory' => $data['options']['inventory']//库存信息,
                ];
                m('cart')->add($newdata);
            }

        }


    }

    //将session里的数据存入数据库

    public function AddSessionData(){

        $uid = $_SESSION['_uid'];

        if($uid){

            foreach ($_SESSION['cart']['goods'] as $k=>$v){

                if($oldData=m('cart')->where("uid={$uid} and name='{$v['name']}' and glid='{$v['options']['glid']}'and gid={$v['id']}")->find()){
                    $oldNum = $oldData['num'];
                    $oldData['num'] = $oldNum + $v['num'];
                    $oldTotol    = $oldData['xiaoji'];
                    $oldData['xiaoji']=$oldTotol +$v['total'];
                    m('cart')->where("uid={$uid} and name='{$v['name']}' and glid='{$v['options']['glid']}'and gid={$v['id']}")->save($oldData);
                }else {
                    $newdata = [
                        'gid' => $v['id'], //商品id
                        'num' => $v['num'], //数量
                        'name' => $v['name'], //商品名字
                        'danjia' => $v['price'], //商品单价
                        'glid' => $v['options']['glid'], //库存组合id
                        'xiaoji' =>  $v['total'], //商品小计
                        'pic' => $v['options']['pic'], //商品图片
                        'uid' => $uid, //用户id
                        'key' => $k,  //编号
                        'inventory' => $v['options']['inventory']//库存信息,
                    ];
                    m('cart')->add($newdata);
                }

            }


        }
    }


    //删除之前的数据
    public function delCartData($uid){

        m('cart')->where("uid={$uid}")->delete();
    }

    //将数据库里对应的数据转化为类似sssion
    public function returnToSession(){
        //用户信息
        $uid = $_SESSION['_uid'];

        if($uid){
            //这里是规格属性
            $data =  m('cart')->where("uid={$uid}")->select();
            foreach ($data as $k=>$v){

    //.........表达式查询..........//
                $map['gtid'] = array('in',$v['glid']);
                $newdata= m("type_attr")->alias('ta')
                    ->join('__GOODS_ATTR__ ga ON ga.taid=ta.taid')
                    ->where("gid={$v['gid']} and class=1")
                    ->where($map)
                    ->select();
                //..将数组将的数据
                $option=[];
                foreach ($newdata as $kk=>$vv){
                    $option[$vv['taname']]=$vv['gtvalue'];
                }

        //.......................................
                $finalData['goods'][$v['caid']]=[
                    "id"=>$v['gid'],       //商品id
                    "num"=>$v['num'],          // 商品数量
                    "name"=>$v['name'],      //商品名字
                    "price"=>$v['danjia'],        //商品价格
                    "options"=>[                      //商品规格
                        "options"=> $option,
                        "pic"=>$v['pic'],       //商品图片
                        "inventory"=>$v['inventory'],
                        "glid"=> $v['glid'],
                        "caid"=>$v['caid'], //cart表的里的id
                    ],
                    "total"=>$v['num']*$v['danjia'],
                ];

        }   //加入总价和总数量
            foreach ($finalData['goods'] as $a=>$b){
                //合计总价
                $finalData['total'] +=$b['total'];
                //合计总价
                $finalData['total_rows'] +=$b['num'];
            }
        return $finalData;

      }

    }

    //删除sesion 的cart值
    public function unSession(){
        unset($_SESSION['cart']);
    }
}