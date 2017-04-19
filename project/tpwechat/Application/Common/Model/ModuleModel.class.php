<?php namespace Common\Model;




class ModuleModel extends BaseModel{


    protected $pk="id";

    protected $tableName="module";


    protected $_validate=[
        ['name','require','模块名称不能为空'],
        ['title','require','模块标识不能为空'],
        ['actions','require','模块动作不能为空'],
    ];




}