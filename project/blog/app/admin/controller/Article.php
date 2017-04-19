<?php namespace app\admin\controller;

use hdphp\view\View;
use hdphp\weixin\build\pay;

class Article extends  Common{

    protected $db;

    public function __init(){

         $this->db= new \system\model\Article();

    }

    public function index(){


      $data = $this->db->getAllData(3,0);

      View::with('data',$data);
        return view();
    }

    public function store(){

        if(IS_POST){

            $res=$this->db->store();

            if($res['valid']){
                //ajax请求的时候会返回：{valid:1,message:'请求成功'}
                message($res['message'],u('index'),'success');
            }
            //{valid:0,message:''}
            message($res['message'],'back','error');

        }

        $cateData  = $this->db->getCateData();

        View::with('cateData',$cateData);

        $tagData = $this->db->getTagData();
        View::with('tagData',$tagData);
        return view();
    }

    public function edit(){

           $aid= q('get.aid');

           if(IS_POST){

                $res= $this->db->edit($aid);

                if($res['valid']){

                    message($res['message'],u('index'),'success');
                }
               message($res['message'],'back','error');
           }
//            获取分类信息
         $cateData=$this->db->getCateData();
        View::with('cateData',$cateData);
//            获取标签信息
         $tagData=$this->db->getTagData();
         View::with('tagData',$tagData);

//         获取旧数据
        $oldData=$this->db->getOldData($aid);
        View::with('oldData',$oldData);
//        获取旧的简直
        $oldTag=Db::table('article_tag')->where('article_aid',$aid)->lists('tag_tid');
//        p($oldTag);
       View::with('oldTag',$oldTag);
        return view();
    }

//    回收站
     public function recycleIndex(){

            $data=$this->db->getAllData(3,1);
//            p($data);
           View::with('data',$data);
           return view();
     }

     public function OutToRecycle(){

         $aid=q('get.aid');
//         p($aid);
         $this->db->where('aid',$aid)->update(['is_recycle'=>0]);
         message('恢复成功',u('recycleIndex'),'success');
     }

     public function delToRecycle(){

         $aid=q('get.aid');

         $this->db->where('aid',$aid)->update(['is_recycle'=>1]);
         message('成功删除到回收站',u('index'),'success');

     }

     public function del(){

         $aid=q('get.aid');

          $res= $this->db->del($aid);

          if($res){

              message('删除成功',u('recycleIndex'),'success');
          }
         message('删除失败','back','error');
     }

    public function upload(){
//        p($_FILES);
        $files = File::upload();
//        p($files);die;
        $path=$files[0]['path'];
        echo $path; die;
//        echo json_encode(1);
    }

    public function delImg(){

        if(IS_AJAX){

            $path=$_POST['path'];
          if(file_exists($path)){

                unlink($path);
          }
        }
            echo 1; exit;
    }

}
