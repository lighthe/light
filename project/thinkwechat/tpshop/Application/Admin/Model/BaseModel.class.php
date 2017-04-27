<?php
namespace Admin\Model;






use Think\Model;

class BaseModel extends Model{




    public function store($data){
        if ($this->create()){
            //判断添加还是修改
            $action=isset($data[$this->pk])? 'save': 'add';
            //执行
            $res = $this->$action($data);
            return ['valid'=>'success','msg'=>'操作成功!','res'=>$res];
        }else{
            return ['valid'=>'error','msg'=>$this->getError()];
        }
    }



}
