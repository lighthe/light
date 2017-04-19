<?php namespace app\home\controller;


use hdphp\view\View;

class Common{

    public function __construct()
    {
        $header=[
            'title'=>'主页',
        ];
        view::with('header',$header);
//        6获取友情链接
            $linkData=$this->getLink();
            View::with('linkData',$linkData);
//        5.获取左侧文章信息
            $articleData=$this->getArticleData();

            view::with('articleData',$articleData);
//        4.获取左侧标签信息
            $tigData=$this->getTigData();
//            p($tigData);
            view::with('tigData',$tigData);
//        3.获取左侧分类信息
        $allCateData=$this->allCateData();
        view::with('allCateData',$allCateData);
//        2.获取分类信息
        $cateData=$this->getCateData();
        view::with('cateData',$cateData);
//        1.获取配置信息
        $webSetData=$this->getWebSet();
        view::with('webSetData',$webSetData);
    }

    public function getLink(){


      return  Db::table('link')->get();
    }


//5.获取左侧文章信息
    public function getArticleData(){

        return Db::table('article')->limit(3)->get();
    }


//    4.获取左侧标签信息
        public function getTigData(){

                $data= Db::table('tag')->get();
            foreach ($data as $k=>$v){

                $data[$k]['total']=Db::table('tag')
                    ->join('article_tag','tid','=','tag_tid')
                    ->where('tag_tid','=',$v['tid'])
                    ->count();
            }

            return $data;
        }

//    3.获取左侧分类信息
        public function allCateData(){
            $data=Db::table('category')->field('cid,cname,pid')->get();
            foreach ($data as $k=>$v){
               $data[$k]['total']=Db::table('article')
                   ->where('category_cid','=',$v['cid'])
                   ->count();
            }

            return $data;

        }

//        2.获取分类信息
    public function getCateData(){

        return Db::table('category')->where('pid',0)->field('cid,cname,pid')->get();
    }

//    1.获取配置信息
    public function getWebSet(){

            return Db::table('webset')->lists('name,value');
    }
}