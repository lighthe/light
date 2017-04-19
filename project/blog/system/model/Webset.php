<?php namespace system\model;


use houdunwang\model\Model;

class Webset extends Model{


    protected $table = "webset";

    //允许填充字段
    protected $allowFill = [ ];

    //禁止填充字段
    protected $denyFill = [ ];

    //自动验证
    protected $validate=[
        //['字段名','验证方法','提示信息',验证条件,验证时间]
    ];

    //自动完成
    protected $auto=[
        //['字段名','处理方法','方法类型',验证条件,验证时机]
    ];



}
