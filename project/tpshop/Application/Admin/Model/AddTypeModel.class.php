<?php namespace Admin\Model;



class AddTypeModel extends BaseModel{



    protected $pk='taid';

    protected $tableName='type_attr';

    protected $_validate=[

        ['taname','require','属性名称不能为空'],
        ['tavalue','require','属性值不能为空'],
        ['class','require','属性名不能为空'],
    ];



}
