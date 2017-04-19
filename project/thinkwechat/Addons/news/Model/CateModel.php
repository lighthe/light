<?php namespace Addons\news\Model;



use Common\Model\BaseModel;

class CateModel extends BaseModel{

    protected $pk='cid';
    protected $tableName='news_cate';

    protected $_validate=[
        ['cname','require','栏目不能为空']
        ];

}
