<?php
namespace Common\Model;


use Think\Model;

class BaseModel extends Model{

    public function store($data){

        //1.自动验证！
        if($this->create($data)){

            //2.判断添加和修改！
            $action= isset($data[$this->pk])?'save':'add';
            //3.调用方法！
            $res=$this-> $action($data);

            return ['valid'=>'success','msg'=>'操作成功','kid'=>$res];
        }else{

            return ['valid'=>'failed','msg'=>$this->getError()];
        }
    }
}
