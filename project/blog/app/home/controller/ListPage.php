<?php namespace app\home\controller;



use hdphp\view\View;
use system\model\Category;

class ListPage extends Common{



    public function index(){

        $cid=q('get.cid');
        if($cid){

            $data=Db::table('category')->get();
            $suji=$this->GetSon($data,$cid);
            $suji[]=$cid;

            $header=[
                'title'=>'分类页',
                'name'=>'分类',
                'value'=>Db::table('category')->where('cid',$cid)->pluck('cname'),
                'count'=>Db::table('article')->whereIn('category_cid',$suji)->count(),
            ];

            view::with('header',$header);

            $artData=Db::table('article')
                ->join('article_data','aid','=','article_aid')
                ->join('category','category_cid','=','cid')
                ->whereIn('category_cid',$suji)
                ->get();

            foreach ($artData as $k=>$v){

                $artData[$k]['tag']=Db::table('tag')
                    ->join('article_tag','tid','=','tag_tid')
                    ->where('article_aid',$v['aid'])
                    ->lists('tid,tname');
            }

            View::with('artData',$artData);

        }
         $tid=q('get.tid');
//         p($tid);
            if($tid){
                $header=[
                    'title'=>'分类页',
                    'name'=>'标签',
                    'value'=>Db::table('tag')->where('tid',$tid)->pluck('tname'),
                    'count'=>Db::table('article_tag')->where('tag_tid','=',$tid)->count(),
                ];
                view::with('header',$header);
                $artData = Db::table('article')
                        ->join('category','category_cid','=','cid')
                        ->join('article_tag','aid','=','article_aid')
                        ->where('tag_tid',$tid)
                        ->get();
                foreach ($artData as $k=>$v){

                    $artData[$k]['tag']=Db::table('tag')
                        ->join('article_tag','tid','=','tag_tid')
                        ->join('article','article_aid','=','aid')
                        ->where('aid','=',$v['aid'])
                        ->lists('tid,tname');
                }
//                p($artData);
                View::with('artData',$artData);
            }


        return view();
    }


    public function GetSon($data,$cid){
            static $tmp;
            foreach ($data as $k=>$v){

                if($v['pid']==$cid){
                    $tmp[]=$v['cid'];
                    $this->GetSon($data,$v['cid']);
                }
            }
            return $tmp;
    }

}