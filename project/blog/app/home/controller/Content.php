<?php   namespace app\home\controller;


use hdphp\view\View;

class Content extends Common {


    public function index(){

       $aid= q('get.aid');

            $artData= Db::table('article')
                ->join('article_data','aid','=','article_aid')
                ->join('category','category_cid','=','cid')
                ->where('aid',$aid)
                ->first();
        $artData['tag']=Db::table('tag')
                ->join('article_tag','tid','=','tag_tid')
                ->where('article_aid',$aid)
                ->lists('tid,tname');
//        p($artData);
        $header=['title'=>$artData['title']];
        view::with('header',$header);
        View::with('artData',$artData);
        return view();
    }
}
