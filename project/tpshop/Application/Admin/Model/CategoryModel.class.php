<?php namespace Admin\Model;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/19
 * Time: 23:13
 */

use Org\Util\ArrBase;
class CategoryModel extends BaseModel{



    protected $pk='cid';


    protected $tableName='category';


    protected $_validate=[
        ['cname','require','分类名称不能为空'],
        ['othername','require','其他名称不能为空'],
        ['sort','require','排序不能为空'],
        ['show','require','显示不能为空'],
    ];



    //数组增强 分类数据
    public function getCate(){

        $cData= $this->select();

        return  (new ArrBase())->tree($cData,'cname');

    }

    //数组增强  不包括子类的的数据
    public function getSonCate($sonData){


        //查找不报告cids的数据
        $suju= $this->where("cid not in (".implode(',',$sonData).")")->select();
         return (new ArrBase())->tree($suju,'cname');
    }



}