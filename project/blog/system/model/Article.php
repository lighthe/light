<?php namespace system\model;

use hdphp\weixin\build\pay;
use houdunwang\model\Model;

class Article extends Model{

    protected $table="article";

    protected $allowFill = [ '*'];
    protected $validate=[
        //['字段名','验证方法','提示信息',验证条件,验证时间]
        //title、sendtime、thumb、digest、author、
        //keywords、user_uid、category_cid
        ['title','isnull','请填写标题',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['thumb','isnull','请上传缩略图',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['digest','isnull','请填写文章摘要',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['author','isnull','请填写文章作者',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['keywords','isnull','请填写关键字',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['category_cid','isnull','请选择文章分类',self::MUST_VALIDATE,self::MODEL_BOTH],
    ];
    protected $auto=[
        //['字段名','处理方法','方法类型',验证条件,验证时机]
        ['sendtime','time','function',self::MUST_AUTO,self::MODEL_INSERT],
        //getUid使我们自定义的方法，在下面
//        ['user_uid','getUid','method',self::MUST_AUTO,self::MODEL_BOTH],
    ];

    public function getAllData($num,$is_recycle)
    {

        $count = Db::table('article')->where('is_recycle',$is_recycle)->count();


          $page = Page::row($num)->make($count);

         $data = Db::table('article')->where('is_recycle',$is_recycle)->limit(Page::limit())->get();
         $data = Db::table('article')
            ->join('category','article.category_cid','=','category.cid')
            ->where('is_recycle',$is_recycle)->limit(Page::limit())
            ->get();
//         p($data);
        return ['page'=>$page,'data'=>$data];
    }


    public function store(){

        if(!isset($_POST['tag'])){
            return ['valid'=>0,'message'=>'请选择标签'];
        }
        //1.添加文章表【两部分：下面第一部分+自动完成】
        //title、sendtime、thumb、digest、author、
        //keywords、user_uid、category_cid
        $this->title = $_POST['title'];
        $this->author = $_POST['author'];
        $this->category_cid = $_POST['category_cid'];
        $this->thumb = $_POST['thumb'];
        $this->digest = $_POST['digest'];
        $this->keywords = $_POST['keywords'];
        //p($_POST);die;
        $aid = $this->save();
//        p($aid);

        $artitleDataModel = new ArticleData();
        $artitleDataModel->des = $_POST['des'];
        $artitleDataModel->content = $_POST['content'];
        $artitleDataModel->article_aid = $aid;
        $artitleDataModel->save();

        $articleTagModel = new ArticleTag();
        //做判断，验证文章标签必须得选择,判断放在最上面
        foreach($_POST['tag'] as $v)
        {
            $articleTagModel->article_aid = $aid;
            $articleTagModel->tag_tid = $v;
            $articleTagModel->save();
        }

        return ['valid'=>1,'message'=>'添加成功'];
    }

    public function edit($aid){

        if(!isset($_POST['tag'])){
            return ['valid'=>0,'message'=>'请选择标签'];
        }
//        blog_article编辑
        $articleModel=$this->find($aid);
        $articleModel->title=$_POST['title'];
        $articleModel->author=$_POST['author'];
        $articleModel->category_cid=$_POST['category_cid'];
        $articleModel->thumb=$_POST['thumb'];
        $articleModel->digest=$_POST['digest'];
        $articleModel->keywords=$_POST['keywords'];
        $articleModel->save();

        $ad_id=Db::table('article_data')->where('article_aid',$aid)->pluck('ad_id');

        $articleDataModel=ArticleData::find($ad_id);
        $articleDataModel->des=$_POST['des'];
        $articleDataModel->content=$_POST['content'];
        $articleDataModel->article_aid=$aid;
        $articleDataModel->save();

        $articleTagModel = new ArticleTag();
        $articleTagModel->where('article_aid',$aid)->delete();

        foreach ($_POST['tag'] as $v){

            $articleTagModel->article_aid=$aid;
            $articleTagModel->tag_tid=$v;
            $articleTagModel->save();
        }
        return ['valid'=>1,'message'=>'编辑成功'];
    }

    public function del($aid){
//        1.删除文章表
        $this->where('aid',$aid)->delete();
//        2.删除文章数据表
        (new ArticleData)->where('article_aid',$aid)->delete();
//        3.删除文章标签表
        (new ArticleTag)->where('article_aid',$aid)->delete();

        return true;
    }

    public function getCateData(){

        return  Arr::tree(Db::table('category')->get(),'cname');

    }
    public function getTagData(){

        return Db::table('tag')->get();
    }

    public function getOldData($aid){

          return Db::table('article')
            ->join('article_data','article.aid','=','article_data.article_aid')
            ->where('article.is_recycle',0)->where('article.aid','=',$aid)->first();
    }
}
