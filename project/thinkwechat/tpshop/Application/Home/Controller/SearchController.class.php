<?php namespace Home\Controller;



use Common\Controller\HomeController;

class SearchController extends HomeController{




    public function search(){


        //配置信息
        $headconf=[
            'title'=>'搜索页',
            'css'=>['index'],
            'js'=>['list'],
        ];

        //获取地址栏参数
            $search=  $_GET['search'];
            $map['gname'] = array('like',"%$search%" );
           $data= m('goods')->where($map)->select();


        $this->assign('listPageData',$data);
        $this->assign('headconf',$headconf);

        $this->display();


    }




}