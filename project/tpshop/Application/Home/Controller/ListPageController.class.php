<?php namespace Home\Controller;







use Common\Controller\HomeController;


class ListPageController extends HomeController {





    //列表页加载
    public function listPage(){
//        //获取商品信息
//         $data= m('goods')->select();


        //配置信息
        $headconf=[
            'title'=>'列表页',
            'css'=>['index'],
            'js'=>['list'],
        ];

        //1.处理面包屑
        $cid =  I('get.cid');
        //找父亲
       $father= $this->getFarther(m('category')->select(),$cid);
        //数组反转
        $father = array_reverse($father);
       // dd($father);
        //数据分配
        $this->assign('father',$father);

        //2.处理分类数据  //获取子类数据
        $sons = $this->getSon(m('category')->select(),$cid);
        //将自己追加进去
        $sons[]=$cid;

        $this->goodsList($sons);

        $this->assign('headconf',$headconf);
        $this->display();
    }


    //3.找子类对应的数据关联
    public function goodsList($cids){
        //获取分类数据

        $gids   =  m('goods')->where("cid in (".implode(',',$cids).")")->getField('gid',true);

        //在type 和Detail表里找到对应数据

        //如果有gids
        if($gids){
                //求分类的下所有商品的属性
            if($gids){
                $field =  m('goods_attr')->alias('ga')
                    -> join('__TYPE_ATTR__ ta ON ga.taid=ta.taid')
                    ->where("ga.gid in (".implode(',',$gids).")")
                    ->group('ga.gtvalue')->select();     //去重
            }



            $temp=[];   //将键名taid相同的为一组
            //遍历数组
            foreach ($field as $k=>$v){
                //将type_attr里的主键作为键名
                $temp[$v['taid']][]=$v;
            }
            //dd($temp);
            //将数组组合为
//        [
//            [
//                'name'=>'袖长',
//                'value'=>[
//                    '长袖','短袖'
//                ],
//            ],
//            [
//                'name'=>'适合人群',
//                'value'=>[
//                    '中年','老年'
//                ],
//            ],
//        ];
            $finalTemp=[];
            foreach ($temp as $a=>$b){

                $finalTemp[]=[
                    'name'=>m('type_attr')->where("taid=$a")->getField('taname'), //获取type_attr 里是tanme值
                    'value'=>$b    //原来的数组
                ];
            }
            // dd($finalTemp);

            //分配数据
            $this->assign('finalTemp',$finalTemp);

            //准备地址栏参数
            $param= isset($_GET['param'])? explode('-',$_GET['param']): array_fill(0,count($finalTemp),0);
           // dd($param);
            $this->assign('param',$param);
            //遍历数组
            foreach ($param as $k=>$v){

                if($v){
                    //如果
                    $gtvalue = m('goods_attr')->where("gtid={$v}")->getField('gtvalue');

                    $filterGids[] =  m('goods_attr')->where("gtvalue='{$gtvalue}'")->getField('gid',true);
                }
            }


            //如果存在
            if($filterGids){
                //冒泡排序
                $finalGids  = $filterGids[0];
                foreach ($filterGids as $k=>$v){
                    //用第一个来求交集
                    $finalGids    =  array_intersect($finalGids,$v);

                    //将原来的覆盖掉 //用原来的来求交集
                }

                //为什么要和所有子类的商品id的集合求交集
                $finalGids = array_intersect($finalGids,$gids);

            }else{
            //不存在的话
            $finalGids =$gids;
            }
            //如果没有gids
        }else{

            $finalGids =[];
        }

        if($finalGids){
            //差交集的gids
             $data =  m('goods')->where("gid in (".implode(',',$finalGids).")")->select();
        }else{
            //如果没有
            $data=[];
        }
        $this->assign('listPageData',$data);
    }


    //找父类
    public function getFarther($data,$cid){
        //获取数据
        static $temp=[];

            foreach ($data as $k=> $v){
                //找父亲
                if($v['cid']==$cid){
                      //将当前的数据保存
                    $temp[]=$v;

                    $this->getFarther($data,$v['pid']);
                }
            }
            return $temp;
    }



    //找子类
    public function getSon($data,$cid){
        //获取数据
        static $temp=[];

        foreach ($data as $k=>$v){
            //如果是子类
            if($v['pid']==$cid){

                $temp[]=$v['cid'];
                $this->getSon($data,$v['cid']);
            }
        }
        return $temp;
    }


}
