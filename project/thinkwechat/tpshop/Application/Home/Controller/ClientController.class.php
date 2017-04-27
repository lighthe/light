<?php
namespace Home\Controller;




use Common\Controller\HomeController;

class ClientController extends HomeController{

    //错误信息
    public function __init(){
        if (!$_SESSION['_uid']){
            redirect(u('Home/error/index'));
        }
    }


    //模版载入
    public function index(){

        //配置信息
        $headconf=[
            'title'=>'个人中心',
            'css'=>['index','client'],
            'js'=>['list'],
        ];
        //调用订单信息
        $this->getList();

        $this->assign('headconf',$headconf);
        $this->display();

    }

    //订单列表信息获取

    public function getList(){

       $uid= $_SESSION['_uid'];

         $Model = M('order');
         $data= $Model->alias('o')
                ->join('__ORDER_LIST__ ol ON o.oid= ol.oid')
                ->join('__GOODS__ go ON go.gid=ol.gid')
                ->join('__USERADDRESS__ u ON o.ader=u.ader')
                ->where("o.uid={$uid}")
                ->select();

         $arr=[];
         foreach ($data as $k=>$v){

             $arr[$v['oid']]['list'][]=$v;

         }
        foreach ($arr as $a=>$b){
             foreach ($b['list'] as $d=>$c){
                    $arr[$a]['time']=$c['time'];
                    $arr[$a]['number']=$c['number'];
                    $arr[$a]['total']=$c['total'];
             }
        }
       $this->assign('list',$arr);
    }

    //删除订单
    public function delOrderAjax(){
        if(IS_AJAX){
               $id = I('post.id');

              m('order')->where("oid={$id}")->delete();
              m('order_list')->where("oid={$id}")->delete();
              $this->success('订单删除成功');
        }

    }
    //修改订单状态
    public function editOrderAjax(){
        if(IS_AJAX){
           $id = I('post.id');
             m('order')->where("oid={$id}")->setField('status','已付款');

            $status= m('order')->where("oid={$id}")->getField('status');

            $this->success($status);
        }
    }

    //获取地址信息
    public function addressOrderAjax(){

        if(IS_AJAX){

            $id = I('post.id');
          $ader =  m('order')->where("oid={$id}")->getField('ader');
             $retun  =    m('useraddress')->where("ader={$ader}")->find();

             $this->success($retun);
        }

    }
}