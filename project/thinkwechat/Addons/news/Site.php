<?php   namespace Addons\news;


use Addons\Module;
use Addons\news\Model\ArticleModel;
use Addons\news\Model\CateModel;

class Site extends Module {

    public function cate(){
        /**
         * 1.得到数据库里的数据
         * 2.将数据分配到页面上
         *
         */
       $data= m('news_cate')->select();
        //dd($data);
        $this->assign('data',$data);
        $this->make();
    }


    public function addCate(){
        /**
         *  。。。。添加数据。。。。
         * 1.得到POST提交的数据；
         * 2.加入数据库
         * .......遍历旧数据.......
         * 1.得到get参数，
         * 2.用cid的值找到数据库里对应的数据，
         * 3.将数据遍历到页面上
         */
        $cid=I('get.cid');
        // dd($cid);
        if(IS_POST){

           $data= I('post.');
           if($cid){
               $data['cid']=$cid;
           }
            //dd($data);
            $this->store((new CateModel()),$data,function (){
                $this->success('添加成功',site_url('news.cate'));die;
            });
        }
        if($cid){
            $oldData= m('news_cate')->where("cid={$cid}")->find();
        }

        $this->assign('oldData',$oldData);
        $this->make();
    }

    public function article(){

        /**
         * 1.得到数据库里的数据
         * 2。将数据库的数据遍历到页面上
         */
        $data= m('news_article')->select();

        $this->assign('oldData',$data);
       // dd(2);
        $this->make();
    }

    public function addArticle(){
        /**
         * .....添加数据.....
         * 1.得到post的数据
         * 2.将数据压进数据库
         * ....遍历旧数据......
         * 1.得到get参数的aid
         * 2.得到数据库里的对应的值
         * 3.将旧数据变量到页面上
         * 4.修改数据
         */
         $aid= I('get.aid');

        if(IS_POST){
            $data=I('post.');
            if($aid){
                $data['aid']=$aid;
            }

            $this->store((new ArticleModel()),$data,function (){

                $this->success('添加成功',site_url('news.article'));die;
            });

        }

        if($aid){
            $field=m('news_article')->where("aid={$aid}")->find();
        }

        // dd($field);
        $this->assign('field',$field);
        $this->make();
    }
        public function del(){
            //1.得到get参数里cid，将数据从数据库里删除，
            //2.得到get参数里aid，将数据从数据库里删除，
                $cid=I('get.cid');
                $aid=I('get.aid');

                if($cid){
                    m('news_cate')->where("cid={$cid}")->delete();
                    $this->success('分类删除成功',site_url('news.cate'));die;
                }

                if($aid){
                    m('news_article')->where("aid={$aid}")->delete();
                    $this->success('文章删除成功！',site_url('news.article'));die;
                }

        }
}
