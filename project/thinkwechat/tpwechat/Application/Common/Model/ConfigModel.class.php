<?php namespace Common\Model;



class ConfigModel extends BaseModel {

    // 主键名称
    protected $pk               =   'id';

    // 数据表名（不包含表前缀）
    protected $tableName        =   'config';

    protected $_validate        =   array(
        array('system','require','验证码必须！'),
    );



}
