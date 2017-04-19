<?php namespace Common\Controller;






use Think\Auth;
use Think\Controller;

class BaseController extends Controller{


    public function __construct()
    {
        parent::__construct();

        if(!session('?username')){

            $this->error('请登入！',u('admin/login/index'));die;
        }


        //权限验证
//        $auth=new Auth();
//        //Admin/Index/index
//        $rule = MODULE_NAME . '/' .CONTROLLER_NAME . '/'.ACTION_NAME;
//
//        $res = $auth->check($rule,$_SESSION[ 'mid' ]);
//        //没有对应权限的话，$res返回是false
//        if(!$res){
//
//            //说明没有权限
//            $this->error('没有权限！！，再点揍你丫的...');exit;
//        }
//
//
        //当方法存在是调用类似与__contruct
        if(method_exists($this,'__init')){
            $this->__init();
        }
    }




    //公共添加修改方法
    public function store( model $model,$data,$url){

                  $res=$model->store($data);

                  $this->message($res,$url);
    }

    //返回信息
    public function message($res,$url){

        if ($res['valid']=='success'){

            $this->success($res['msg'],$url);die;
        }
        $this->error($res['msg']);die;
    }



    /**
     * @param $model 数据表
     * @param $num 每页显示的记录数
     * @param $id 已什么方式排序
     * @param string $order 排序方式
     * @return array 返回分页数据和分页显示输出
     */
      public function makePage($model,$num,$id,$order='asc'){

          $User = M("$model"); // 实例化User对象
          $count      = $User->count();// 查询满足要求的总记录数

          $Page      = new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数

          //%HEADER% %TOTAL_ROW%
          // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
          $data = $User->order("$id $order")->limit($Page->firstRow.','.$Page->listRows)->select();
          $Page->setConfig('header','数据共');
          $Page->setConfig('theme',"%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
          $show       = $Page->show();// 分页显示输出

//
//          $show .= <<<str
//                <style>
//                    /*其他页、上一页、下一页样式*/
//                    .pagination .num,.prev,.next{
//                        position: relative;
//                        float: left;
//                        padding: 6px 12px;
//                        margin-left: -1px;
//                        line-height: 1.42857143;
//                        color: #337ab7;
//                        text-decoration: none;
//                        background-color: #fff;
//                        border: 1px solid #ddd
//                    }
//                    /*当前分页样式*/
//                    .pagination .current{
//                        position: relative;
//                        float: left;
//                        padding: 6px 12px;
//                        margin-left: -1px;
//                        line-height: 1.42857143;
//                        color: red;
//                        text-decoration: none;
//                        background-color: #fff;
//                        border: 1px solid #ddd
//                    }
//                    .pagination .headerPage{
//                        position: relative;
//                        float: left;
//                        padding: 6px 12px;
//                        text-decoration: none;
//                        background-color: #fff;
//
//                    }
//                </style>
//
//str;
          return ['pageData'=> $data,'show'=>$show];
      }
}




