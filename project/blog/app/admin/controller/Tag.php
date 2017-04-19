<?php namespace app\admin\controller;


class Tag extends Common{

 protected $db;

 public function __init(){

     $this->db= new \system\model\Tag;
 }


    public function index(){

      $data=Db::table('tag')->get();

//      p($data);

      View::with('data',$data);

        return view();
    }

    public function store(){


        if(IS_POST){


               $res=$this->db->store();
//               p($res);
               if($res['valid']){
//                    p($res['valid']);
                   message($res['message'],u('index'),'success');
               }
               message($res['message'],'back','error');
        }

        return view();
    }
    public function edit(){
         $tid=q('tid');
         if(IS_POST){

               $res=$this->db->edit($tid);
                 if($res['valid']){

                     message($res['message'],u('index'),'success');
                 }
                message($res['message'],'back','error');
         }
         $data= Db::table('tag')->where('tid',$tid)->get();
         $data=current($data);
         View::with('data',$data);
         return view();
    }

    public function del(){

          $tid=q('tid');

          $res= Db::table('tag')->where('tid',$tid)->delete();

          if($res){
              message('删除成功',u('index'),'success');
          }
         message('删除失败',u('index'),'success');
    }

}