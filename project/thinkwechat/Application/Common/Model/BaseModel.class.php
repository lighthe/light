<?php namespace Common\Model;



use Think\Model;

class  BaseModel extends Model {


    public function store($data){

        if($this->create($data))
        {
            //验证通过
            //$this->pk = 'id';
            //$data[$this->pk] = 1;
            $action = isset($data[$this->pk]) ? 'save' : 'add';
            //add save
            //执行添加是会返回主键id
            $res=$this->$action($data);
            return ['valid'=>'success','msg'=>'操作成功','data'=>$res];
        }else{

            return ['valid'=>'failed','msg'=>$this->getError()];
        }

    }

}
