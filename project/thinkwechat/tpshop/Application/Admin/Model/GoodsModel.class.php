<?php

namespace Admin\Model;





class GoodsModel extends BaseModel {



    protected $pk='gid';


    protected $tableName='goods';


    protected $_validate=[
        ['gname','require','商品名称不能为空'],
        ['gtitle','require','描述名称不能为空'],
        ['gnumber','require','商品货号不能为空'],
        ['unit','require','商品单位不能为空'],
        ['marketprice','require','市场价格不能为空'],
        ['shopprice','require','商城价格不能为空'],
        ['pic','require','列表图不能为空'],
        ['click','require','点击数不能为空'],
    ];


    //获取logo表的数据
    public function logoData(){

        return  m('logo')->select();
    }

    //添加商品
    public function addGoods($data){
        //如果是修改获取gid的主键
        $oldGid=$data['gid'];


        //商品表字段验证
        if (!$this->create()){

            return ['valid'=>'error','msg'=>$this->getError()];
        }

//>>>>>>>>>>>>>>>>>//添加商品表
        //商品表修改
        if ($oldGid){
            //商品修改
            $this->save($data);
        }else{
            //商品添加
            //压入时间
            $data['time']=time();
            //压入管理员
            $data['mid']=session('mid');
            $gid=$this->add($data);
        }

//>>>>>>>>>>>>>//商品表添加

        //>>>>>>>>>>>>>>>>>>>>//验证商品详情表
        $resDetail=new GoodsDetailModel();
        if (!$resDetail->create()){
            return ['valid'=>'error','msg'=>$resDetail->getError()];
        }
        //如果是修改的话
        //去掉图片中的big_
        if ($oldGid){
            foreach ($data['img'] as $q=>$W){
                if (preg_match("/big/",$W)){
                    $big=basename($W);
                    $big1= str_replace('big_','',$big);
                    $data['img'][$q]= $big2= dirname($W).'/'.$big1;
                }
            }
        }
             //大中小图
            $arr=['big_','medium_','small_'];
            //路径处理
            $res=$this->picPath($data['img'],$arr);
            //图片处理
            $picS=$this->makepic($res);

        //添加图片数据处理
        if ($oldGid){
            //如果有$oldgid的话修改
            $detailData = [
                'small'=>rtrim($picS['smallPath'],'|'),
                'medium'=>rtrim($picS['mediumpath'],'|'),
                'big'=>rtrim($picS['bigPath'],'|'),
                'intro'=>$data['intro'],
                'service'=>$data['service'],
                'gid'=>$oldGid,
            ];
            //修改商品详情表
            m('goods_detail')->where("gid={$oldGid}")->save($detailData);
        }else{
            //添加图片数据
            $detailData = [
                'small'=>rtrim($picS['smallPath'],'|'),
                'medium'=>rtrim($picS['mediumpath'],'|'),
                'big'=>rtrim($picS['bigPath'],'|'),
                'intro'=>$data['intro'],
                'service'=>$data['service'],
                'gid'=>$gid,
            ];
            //写入商品详情表
            $resDetail->add($detailData);
        }


//>>>>>>>>>>>>>>>>>//验证商品属性表
        $goodsAttr =  new GoodsAttrModel();
        //旧数据处理
        if($oldGid){

            //删除属性表
            m('goods_attr')->where("gid={$oldGid}")->delete();

            foreach ($data['attr'] as $k=>$v){
                $goodsAttrData=[
                    'gid'=>$oldGid,
                    'gtvalue'=>$v,
                    'added'=>0,
                    'taid'=>$k
                ];
                $goodsAttr->add($goodsAttrData);
            }

            //商品属性处理
            foreach ($data['spec'] as $k=>$v){

                foreach ($v['spec'] as $kk=>$vv){
                    $goodSpecData=[
                        'taid'=>$k,
                        'gid'=>$oldGid,
                        'gtvalue'=>$vv,
                        'added'=>$v['added'][$kk],

                    ];
                    $goodsAttr->add($goodSpecData);
                }

            }
        }else{
            //商品属性表添加

            foreach ($data['attr'] as $k=>$v){
                $goodsAttrData=[
                    'gid'=>$gid,
                    'gtvalue'=>$v,
                    'added'=>0,
                    'taid'=>$k
                ];
                $goodsAttr->add($goodsAttrData);
            }

            //商品属性处理
            foreach ($data['spec'] as $k=>$v){
                foreach ($v['spec'] as $kk=>$vv){
                    $goodSpecData=[
                        'taid'=>$k,
                        'gid'=>$gid,
                        'gtvalue'=>$vv,
                        'added'=>$v['added'][$kk],

                    ];
                    $goodsAttr->add($goodSpecData);
                }

            }

        }
        return ['valid'=>'success','msg'=>'操作成功!'];
    }




    //路径处理
    public function picPath($img,$arr){
            $newdata= '';
        foreach ($arr as $k=>$v){
            foreach ($img as $kk=>$vv){
                $data = dirname( $vv ) . '/'.$v . basename( $vv );
                $newdata .= $data . '|';
            }
        }
         $suJu= array_filter(explode('|',$newdata));
        return $suJu;
    }
    //图片处理
    public function makepic($res){

        $bigPath='';
        $smallPath='';
        $mediumpath='';

        foreach ($res as $v){

            //大图处理
            if (preg_match("/big/",$v)){
                $big=basename($v);
                $big1=str_replace('big_','',$big);
                $image = new \Think\Image();
                $big2= dirname($v).'/'.$big1;
                $image->open($big2);
                $bigPath .= $v.'|';
                $image->thumb(1000, 1000)->save($v);
            }

            //中图处理
            if (preg_match("/medium/",$v)){
                $medium=basename($v);
                $medium1=str_replace('medium_','',$medium);
                $image = new \Think\Image();
                $medium2= dirname($v).'/'.$medium1;
                $image->open($medium2);
                $mediumpath .= $v.'|';
                $image->thumb(600, 600)->save($v);
            }

            //小图处理
            if (preg_match("/small/",$v)){
                $small=basename($v);
                $small1=str_replace('small_','',$small);
                $image = new \Think\Image();
                $small2= dirname($v).'/'.$small1;
                $image->open($small2);
                $smallPath .= $v.'|';
                $image->thumb(200, 200)->save($v);
            }
        }
        //返回数据
        return ['bigPath'=>$bigPath,'smallPath'=>$smallPath,'mediumpath'=>$mediumpath];
    }

}
