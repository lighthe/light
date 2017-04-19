<?php

namespace Admin\Model;



class GoodsDetailModel extends BaseModel{


    protected $pk='gtid';

    protected $tableName='goods_detail';


    protected $_validate=[
        ['intro','require','请输入商品详情'],
        ['service','require','请输入详情售后服务'],
    ];


}