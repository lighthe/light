<?php namespace Admin\Controller;



use Admin\Model\AddTypeModel;
use Admin\Model\TypeModel;
use Common\Controller\BaseController;

class TypeController extends BaseController{





    public function index(){
        //配置信息
        $headconf=[
            'Elements'=>'类型管理',
            'Components'=>'类型列表'
        ];
        $this->assign('headconf',$headconf);

            //调用分页方法
         $res=$this->makePage('type',10,'tid');


        $this->assign('Typedata',$res['pageData']);// 赋值数据

        $this->assign('page',$res['show']);// 赋值分页输出

       $this->display();
    }



//添加方法
 public function add(){
     //配置信息

        $tid=  I('get.tid');


        if (!$tid){

            $headconf=[
                'Elements'=>'分类管理',
                'Components'=>'添加类型'
            ];
            $this->assign('headconf',$headconf);

        }else{

            $headconf=[
                'Elements'=>'分类管理',
                'Components'=>'编辑类型'
            ];
            $this->assign('headconf',$headconf);
        }


         $data=I('post.');

         if(IS_POST){

            //判断添加还是删除
             if ($tid){

                 $data['tid']=$tid;
             }

              $this->store((new TypeModel()),$data,u('admin/type/index'));
         }

            //旧数据
         if ($tid){

             $oldTypeData=m('type')->where("tid={$tid}")->find();
         }

        //分配数据
        $this->assign('oldTypeData',$oldTypeData);

        $this->display();
 }


        //删除方法
    public function del(){




        $tid= I('get.tid');
            //判断类型删除
        if($tid){

            m('type')->where("tid={$tid}")->delete();

            $this->success('删除成功',u('admin/type/index'));
        }


    }

    //属性删除
    public function attrDel(){

            $tid= I('get.tid');
             $taid= I('get.taid');


            m('type_attr')->where("taid={$taid}")->delete();

            $this->success('删除成功',u('admin/type/type',['tid'=>$tid]));


    }

   //属性类型
    public function type(){
        //配置信息
        $headconf=[
            'Elements'=>'分类管理',
            'Components'=>'类型属性'
        ];
        $this->assign('headconf',$headconf);

         $tid= I('get.tid');

       $oldData= m('type_attr')->where("tid={$tid}")->select();

        $this->assign('oldData',$oldData);
        $this->display();
    }

    //添加属性
    public function addtype(){

        //配置信息



           $taid= I('get.taid');

           $tid=I('get.tid');

           if(!$taid){
               $headconf=[
                   'Elements'=>'分类管理',
                   'Components'=>'添加类型属性'
               ];
               $this->assign('headconf',$headconf);
           }else{
               $headconf=[
                   'Elements'=>'分类管理',
                   'Components'=>'编辑类型属性'
               ];
               $this->assign('headconf',$headconf);
           }




        if(IS_POST){

             $data=I('post.');


             //修改判断
             if($taid){

                 $data['taid']=$taid;
             }
             $this->store((new AddTypeModel()),$data,u('admin/type/type',['tid'=>$tid]));

         }

        //编辑的旧数据
        if($taid){
             $attrData=m('type_attr')->where("taid={$taid}")->find();
             $this->assign('attrData',$attrData);
        }

      $this->display();
    }


}
