<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/31
 * Time: 23:45
 */

namespace Home\Model;



use Admin\Model\BaseModel;

class AddressModel extends BaseModel{




    protected $pk='ader';

    protected $tableName='useraddress';

    protected $_validate=[
        ['clientname','require','收货人不能为空'],
        ['address','require','详细地址不为空'],
        ['postnum','require','邮编不能为空'],
        ['cellphone','require','手机号码不能为空'],
    ];




    public function addDizhi($data){
        //自动验证
        if (!$this->create()){
            return ['valid'=>3,'msg'=>$this->getError()];
        }

        //获取主键
        $ader = $data['ader'];
        //地址
        $diZi=[];
        //组合地址
        $diZi[]=$data['area1'];
        $diZi[]=$data['area2'];
        $diZi[]=$data['area3'];
        //将数组拆成字符串
       $data['place'] =implode(' ',$diZi);


        //判断
        if ($ader){
//                dd($data);die;
            $data['ader']=$ader;
            //修改
           $this->save($data);
          return  ['valid'=>2,'send'=>$data,'msg'=>'亲你的地址修改成功'];
        }else{
            //数据库添加
            $ader = $this->add($data);
            //需要主键
            $data['ader']=$ader;
            //ajax返回
          return ['valid'=>1,'send'=>$data,'msg'=>'亲你的地址添加成功'];

        }



    }




}