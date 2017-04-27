<?php namespace Common\Model;






class KeywordModel extends BaseModel{


    protected $pk = 'kid';
    protected $tableName = 'keyword';
    protected $_validate = [
        ['keyword','require','请输入关键词'],
    ];





}
