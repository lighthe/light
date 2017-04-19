<?php
namespace Home\Controller;





use Common\Controller\HomeController;


class CartController extends HomeController {

    //载入购物车页
    public function index(){


        //配置信息
        $headconf=[
            'title'=>'购物车',
            'css'=>['index'],
            'js'=>['list'],
        ];
        $this->assign('headconf',$headconf);

        //如果用户有登入的话怎么实现
        $this->display();
    }



    //点击 加号 和 减号
    public function cartSubAjax(){

        if(IS_AJAX){
            //如果用户已经登入
            if($_SESSION['_uid']){
                //获取数量,
                $num=I('post.num');
                //要改的键名
                $name= I('post.goods');
                $xiaoji =  I('post.xiaoji');
                $User = M("cart"); // 实例化User对象
             // 更改用户的num和xiaoji的值
                $data = array('num'=>$num,'xiaoji'=>$xiaoji);
                $User-> where("caid={$name}")->setField($data);
             }else{
                //获取数量,
                $num=I('post.num');
                //要改的键名
                $name= I('post.goods');
                $xiaoji =  I('post.xiaoji');
                $all = I('post.all');
                $mount =I('post.mount');
                //修改数量
                $_SESSION['cart']['goods'][$name]['num']=$num;
                //修改小计
                $_SESSION['cart']['goods'][$name]['total']=$xiaoji;
                //修改总价
                $_SESSION['cart']['total_rows']=$all;
                //修改总数
                $_SESSION['cart']['total']=$mount;
            }

        }
    }



    //点击删除
    public function cartDelAjax()
    {

        if (IS_AJAx) {


            //如果客户已经登入
            if($_SESSION['_uid']){

                //获取要删除的id
                $order = I('post.order');

                //将数据库的对应的数据删除
                 m('cart')->where("caid={$order}")->delete();

                $data = $this->returnToSession();
                 //...   //....
               //将删的返
                if (!count($data)){
                    $this->ajaxReturn(['valid'=>11]);
                }else{
                    //如何普通删除处理
                    $this->ajaxReturn(['valid'=>1,'id'=>$order]);
                }

            }else{

                //获取要删除的标识
                $order = I('post.order');
                //标识的数据
                $goods = $_SESSION['cart']['goods'][$order];
                //标识的总价
                $total = $goods['total'];
                //标识的数量
                $num =$goods['num'];

                //删除对应的数据
                unset($_SESSION['cart']['goods'][$order]);
                //修改数据
                $_SESSION['cart']['total_rows']= $_SESSION['cart']['total_rows']-$num;
                $_SESSION['cart']['total']= $_SESSION['cart']['total']-$total;

                //如果session里没有货时
                if (!count($_SESSION['cart']['goods'])){

                    $this->ajaxReturn(['valid'=>11]);
                }else{
                    //如何普通删除处理
                    $this->ajaxReturn(['valid'=>1,'id'=>$order]);
                }

            }

        }
    }

}