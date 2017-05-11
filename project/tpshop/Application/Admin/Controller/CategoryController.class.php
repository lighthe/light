<?php namespace Admin\Controller;






use Admin\Model\CategoryModel;
use Common\Controller\BaseController;


class CategoryController extends BaseController{


    protected $db;

    public function __init(){

        $this->db = new CategoryModel();

    }


    //分类列表数据
    public function index(){
        //配置信息
        $headconf=[
            'Elements'=>'分类管理',
            'Components'=>'分类列表'
        ];
        $this->assign('headconf',$headconf);


        //数组增强
        $cData=$this->db->getCate();

        $this->assign('cData',$cData);
        $this->display();
    }


    //添加顶级分类
    public function topCate(){

        //配置信息
        $headconf=[
            'Elements'=>'分类管理',
            'Components'=>'添加顶级分类'
        ];
        $this->assign('headconf',$headconf);

        if(IS_POST){

             $data= I('post.');

            $this->store((new CategoryModel()),$data,u('Admin/Category/index'));
        }
        $this->display();
    }


    //添加子集分类
    public function sonCate(){

        //配置信息
        $headconf=[
            'Elements'=>'分类管理',
            'Components'=>'添加子集分类'
        ];
        $this->assign('headconf',$headconf);
        if(IS_POST){

            $data=I('post.');
            //判断是否是编辑
             $this->store((new CategoryModel()),$data,u('Admin/Category/index'));
        }

        //所属分类信息
        $typeData= m('type')->select();
        $this->assign('typeData',$typeData);
        $this->display();
    }


   //编辑信息
    public function editCate(){

        //配置信息
        $headconf=[
            'Elements'=>'分类管理',
            'Components'=>'编辑分类'
        ];
        $this->assign('headconf',$headconf);
        $cid=I('get.cid');

        if(IS_POST){
            $data=I('post.');

            //判断是否是编辑
            if($cid){
                $data['cid']=$cid;
            }
            $this->store((new CategoryModel()),$data,u('Admin/Category/index'));
        }


        $cData= m('category')->select();

        //得到子类的cid
        $sonData=$this->getSon($cData,$cid);
        $sonData[]=$cid;


        //分类数据  ...数组增强
        $cData=$this->db->getCate($sonData);
        //数据分配
        $this->assign('cData',$cData);

        //旧数据查询
        $cateData = m('category')->where("cid={$cid}")->find();
         $this->assign('CateData',$cateData);

        //所属分类信息
        $typeData= m('type')->select();
        $this->assign('typeData',$typeData);
        $this->display();
    }

    //找子类
    public function getSon($data,$cid){

           static $var=[];
        foreach ($data as $k=>$v){

          if ($v['pid']==$cid){

            $this->getSon($data,$v['cid']);

            $var[]=$v['cid'];
          }

        }
        return $var;
    }

    //删除分类
    public function del(){

          $cid= I('get.cid');
        //得到言删除的数据的pid
        $pid= m('category')->where("cid={$cid}")->getField('pid');
        //将所选的数据删除
          m('category')->where("cid={$cid}")->delete();
        //修改子集的pid
        m('category')->where("pid={$cid}")->setField('pid',$pid);

        $this->success('删除成功!',u('admin/category/index'));die;

    }

}
