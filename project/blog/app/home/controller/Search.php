<?php namespace app\home\controller;



class Search extends Common{

    public function index(){

        $search=$_POST['search'];
        if(empty($search)){
            message('请输入搜索内容','back','error');
        }

       if($aids= Db::table( 'article' )->where( 'title','like', "%$search%" )->lists('aid')) {

           $content=[
               'name'=>'以下是搜索的内容:',
           ];
           View::with('content',$content);

           $artData= Db::table('article')
               ->join('article_data','aid','=','article_aid')
               ->join('category','category_cid','=','cid')
               ->whereIn('aid',$aids)
               ->get();

           View::with('artData',$artData);
       }else{

           $content=[
               'name'=>'您搜索的内容不存在！',
           ];
           View::with('content',$content);
       }

        return view();
    }
}
