<?php namespace  Addons\button\Model;


use Common\Model\BaseModel;

class ButtonModel extends BaseModel{

    protected $pk = 'id';
    protected $tableName = 'button';
    protected $_validate = [
        ['title','require','请输入菜单标题'],
        ['content','require','请填写菜单内容'],

    ];

}