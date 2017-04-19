<?php namespace system\model;


use houdunwang\model\Model;

class Tag extends Model{

    //数据表
    protected $table = "user";

    public function store(){


        if(strlen($_POST['tname'])==0){
            return ['valid'=>0,'message'=>'请填写标签内容'];
        }

        $data=explode('|',$_POST['tname']);

        foreach ($data as $k=>$v){
//                p($v);
            Db::table('tag')->insertGetId(['tname'=>$v]);
//            $this-> insertGetId(['tname'=>$v]);
        }
        return  ['valid'=>1,'message'=>'添加成功'];
    }

    public function edit($tid){

        if(strlen($_POST['tname'])==0){
            return ['valid'=>0,'message'=>'请填写标签内容'];
        }
        $tname=$_POST['tname'];
        $data=Db::table('tag')->where('tid',$tid)->update(['tname'=>$tname]);
        return  ['valid'=>1,'message'=>'编辑成功'];
    }

}