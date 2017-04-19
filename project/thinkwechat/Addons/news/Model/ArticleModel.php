<?php namespace Addons\news\Model;

use Common\Model\BaseModel;

class ArticleModel extends BaseModel{

    protected $pk='aid';

    protected $tableName='news_article';

    protected $_validate=[
        ['title','require','文章标题不能为空'],
        ['content','require','文章内容不能为空'],
    ];

}
