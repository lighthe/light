<?php
namespace Admin\Model;


class GoodslistModel extends BaseModel{


    protected $pk='glid';

    protected $tableName='goods_list';


    protected $_validate=[
       // ['combine','require','请输入规格信息'],
        ['number','require','请输入货号'],
        ['inventory','require','请输入库存'],
    ];


}