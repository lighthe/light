<?php namespace system\model;

use hdphp\weixin\build\pay;
use houdunwang\model\Model;

class Link extends Model{

//    数据表
    protected $table = "link";

    //允许填充字段
    protected $allowFill = [ '*'];

    //禁止填充字段
    protected $denyFill = [ ];


    protected $validate=[
        //['字段名','验证方法','提示信息',验证条件,验证时间]
        ['lname','isnull','请填写友情链接名称',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['logo','isnull','请上传logo',self::EMPTY_VALIDATE,self::MODEL_BOTH],
        ['url','isnull','请填写路径',self::EMPTY_VALIDATE,self::MODEL_BOTH],
        ['sort','num:1,9999','排序必须为数字',self::EMPTY_VALIDATE,self::MODEL_BOTH],

    ];

    //自动完成
    protected $auto=[
        //['字段名','处理方法','方法类型',验证条件,验证时机]
        ['addtime','time','function',self::MUST_AUTO,self::MODEL_BOTH],
    ];

    public function store(){

      return  $this->save($_POST);

    }

    public function edit($lid){

//        p($_POST);
//        p($lid);
        $linkModel=$this->find($lid);
        $linkModel->lname=$_POST['lname'];
        $linkModel->logo=$_POST['logo'];
        $linkModel->url=$_POST['url'];
        $linkModel->sort=$_POST['sort'];
        $linkModel->save();

        return true;
    }

}
