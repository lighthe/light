<?php namespace app\admin\controller;



class WebSet extends Common{


    public function index(){

        $webSetModel  = new \system\model\WebSet();
        if (IS_POST){

           foreach ($_POST['value'] as $k=>$v){

                  if(!$v){
                      message('第'.$k.'条配置不能为空','back','error');
                  }
               $webSetModel->where('wid',$k)->update(['value'=>$v]);

           }
             message('配置项修改成功',u('index'),'success');

        }
         $data=$webSetModel->get()->toArray();

         View::with('data',$data);
          return view();
    }

}
