<?php
namespace Home\Controller;
use Common\Controller\HomeController;
use Home\Model\LoginModel;
use Org\Util\ArrBase;

class IndexController extends HomeController {





    public function index(){
        //配置信息
        $headconf=[
            'title'=>'首页',
            'css'=>['index'],
            'js'=>['index'],
        ];

        $this->assign('headconf',$headconf);


        //查找category表里的数据
        $data=m('category')->select();

        //数据分类
        $res=(new ArrBase())->channelLevel($data,$pid=0,$html='&nbsp',$fieldPri = 'cid', $fieldPid = 'pid');


        foreach ($res as $k=>$v){
            foreach ($v['_data'] as $kk=>$vv){
                foreach ($vv['_data'] as $kkk=>$vvv){
                    $res[$k]['_data'][$kk]['_data'][$kkk]['pic']= m('goods')->where("cid={$kkk}")->getField('pic');
                    $res[$k]['_data'][$kk]['_data'][$kkk]['gname']= m('goods')->where("cid={$kkk}")->getField('gname');
                    $res[$k]['_data'][$kk]['_data'][$kkk]['price']= m('goods')->where("cid={$kkk}")->getField('shopprice');
                    $res[$k]['_data'][$kk]['_data'][$kkk]['price']= m('goods')->where("cid={$kkk}")->getField('shopprice');
                    $res[$k]['_data'][$kk]['_data'][$kkk]['marketprice']= m('goods')->where("cid={$kkk}")->getField('marketprice');
                }
            }
        }

        //列表
        $arr=[];
        foreach ($res as $a=>$b){
            $arr[$b['cid']]['cname']=$b['cname'];
            $arr[$b['cid']]['cid']=$b['cid'];
            foreach ($b['_data'] as $aa=>$bb ){
                foreach ($bb['_data'] as $aaa=>$bbb){
                    $arr[$b['cid']]['_data'][$bbb['cid']]=$bbb;
                }
            }
        }

        $this->assign('toplist',$arr);





        //热门
        $hot = m('goods')->order('click desc')->limit(5)->select();
        $this->assign('hot',$hot);

        //得到手机
        $cellphone=[];
        foreach ($arr as $c=>$d){

            if($c==1){
                $cellphone[]=$d;
            }
        }
        $cellphone=  current($cellphone);
        $this->assign('cellphone',$cellphone);
        //...............

        //手表
        $watch=[];
        foreach ($arr as $c=>$d){

            if($c==2){
                $watch[]=$d;
            }
        }
        $watch=  current($watch);
        $this->assign('watchs',$watch);


        //路由器
        $rout=[];
        foreach ($arr as $c=>$d){

            if($c==3){
                $rout[]=$d;
            }
        }
        $rout=  current($rout);
        $this->assign('rout',$rout);
        //..............

        //车载
        $car=[];
        foreach ($arr as $c=>$d){

            if($c==4){
                $car[]=$d;
            }
        }
        $car=  current($car);
        $this->assign('car',$car);
        //.....
       $all=  m('goods')->order('time desc')->limit(20)->select();
        $this->assign('all',$all);

        $this->assign('listData',$res);
        $this->display();
    }









    //登入页面
    public function login(){
          $this->display();
    }


    //首页登入
    public function homeLoginAjax(){
        if(IS_AJAX){
            //获取数据
            $data=I('post.');
            //发送数据到模型
            $res=(new LoginModel())->login($data);
            //返回比对
            if($res['valid']){
                //调用购物车的数据
                $this->AddSessionData();
                //如果登入删除session
               $this->unSession();
                $this->success($res['msg'],u('Home/index/index'));
            }
            //错误提示
            $this->error($res['msg']);
        }
    }

}



