<?php namespace Addons\Base\Model;


use Common\Model\BaseModel;

class BaseTextModel extends BaseModel{

    protected $pk = 'id';
    protected $tableName='base_text';
    protected $_validate = [
        ['system','require','请输入关注回复消息'],
        ['default','require','请输入默认回复消息'],
    ];

}

