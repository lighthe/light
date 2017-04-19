<?php


namespace Admin\Model;



class LogoModel extends BaseModel{



    protected $pk= 'lid';

    protected $tableName= 'logo';

    protected $_validate=[
        ['lname','require','品牌名称不能为空'],
        ['lsort','require','排序不能为空'],
        ['logo','require','品牌logo不能为空'],
        ['l_show','require','显示不能为空'],
        ['lhot','require','热度不能为空'],
    ];








}
