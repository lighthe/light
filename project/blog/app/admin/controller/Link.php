<?php namespace app\admin\controller;


use hdphp\view\View;

class Link extends Common{

    protected $db;

    public function __init(){

        $this->db = new \system\model\Link();
    }

    public function index(){

        $data=Db::table('link')->get();
//        p($data);
        View::with('data',$data);
        return view();
    }

    public function store(){

        if(IS_POST){

            $res= $this->db->store();
            if($res){

                message('友链添加成功',u('index'),'success');
            }
            message('友链添加失败','back','error');
        }

        return view();
    }

    public function edit(){
         $lid=q('get.lid');


         if(IS_POST){

             $res= $this->db->edit($lid);

             if($res){

                 message('编辑成功',u('index'),'success');
             }
             message('编辑失败','back','error');
         }

        $data=$this->db->where('lid',$lid)->first()->toArray();


        View::with('data',$data);
        return view();
    }


    public function del(){

         $lid=q('get.lid');

         $res=$this->db->where('lid',$lid)->delete();

        if ($res){

            message('删除成功',u('index'),'success');
        }
        message('删除失败','back','error');
    }

}
