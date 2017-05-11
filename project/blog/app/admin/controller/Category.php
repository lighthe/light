<?php  namespace  app\admin\controller;




class Category extends Common{

    protected $db;

    public function __init(){

       $this->db = new \system\model\Category();

    }

    public function index(){

        $data = Db::table('category')->get();

        $data = Arr::tree($data,cname);
        View::with('data',$data);

        return view();
    }


    public function store(){

        if(IS_POST){

            if($this->db->store()){
                message('添加顶级分类成功',u('index'),'success');
            }
            message('添加顶级分类失败','back','error');
        }

        return view();
    }


    public function addSon(){

        if(IS_POST){
//            p($_POST);
            if($this->db->store()){
                message('添加子集分类成功',u('index'),'success');
            }
            message('添加子集分类失败','back','error');
        }
        $cid=q('get.cid');
//        p($cid);
        $data= Db::table('category')->where('cid', $cid)->get();
//        $cateData = Db::table('category')->find($cid);
         $data= current($data);
         View::with('data',$data);
//        p($data);
        return view();
    }


    public function edit(){

        if(IS_POST)
        {
            if($this->db->edit()){
                message('分类编辑成功',u('index'),'success');
            }
            message('编辑失败','back','error');
        }
         $cid=q('get.cid');
//         p($cid);
         $oldData=Db::table('category')->where('cid',$cid)->get();
         $oldData=current($oldData);
//         p($oldData);
         View::with('oldData',$oldData);

        $cateData=$this->db->getCateData($cid);
//        p($cateData);
        View::with('cateData',$cateData);
         return view();
    }

    public function del(){

         $cid=q('get.cid');
////         p($cid);
//         if($this->db->del($cid)){
//
//             message('删除成功',u('index'),'success');
//         }

          $pid=Db::table('category')->where('cid',$cid)->get();


           $data=$this->db->where('pid',$cid)->update(['pid'=>$pid]);


            $res= \system\model\Category::delete($cid);

            p($res);
    //echo $res;

        if($res){

            message('删除成功',u('index'),'success');
        }
        message('删除失败','back','error');
    }

}
