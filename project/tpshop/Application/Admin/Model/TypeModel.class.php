<?php namespace Admin\Model;




class TypeModel extends BaseModel {


    protected $pk='tid';

    protected $tableName='type';


    protected $_validate =array(

        array('tname','require','类型不能为空！'),

    );


}
