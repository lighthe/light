<?php namespace Addons\text\Model;


use Common\Model\BaseModel;

class TextContentModel extends BaseModel{

    protected $pk = 'id';
    protected $tableName='text_content';
    protected $_validate = [
        ['content','require','请输入回复内容'],
    ];

}
