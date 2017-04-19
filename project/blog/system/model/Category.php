<?php namespace system\model;
use houdunwang\model\Model;
class Category extends Model{
	//数据表
	protected $table = "category";

	//允许填充字段
	protected $allowFill = [ '*'];

	//禁止填充字段
	protected $denyFill = [ ];

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
        ['cname','isnull','分类名称不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['ctitle','isnull','分类标题不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['cdes','isnull','分类描述不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['ckeywords','isnull','分类关键字不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['csort','isnull','分类排序不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
	];

	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=false;


	public function store(){

        return $this->save($_POST);
    }


    public function getCateData($cid){
//        p($cid);
        $data=Db::table('category')->get();
        $cids=$this->getSon($data,$cid);
//        p($cids);
        $cids[]=$cid;
        $data= $this->whereNotIn('cid',$cids)->get()->toArray();
           return Arr::tree($data,'cname');
//        p($data);
    }




    public function getSon($data,$cid)
    {
        static $temp =[];
       foreach ($data as $k=>$v){

           if($v['pid']==$cid){

               $temp[]=$v['cid'];

                $this->getSon($data,$v['cid']);
           }
       }
        return $temp;
    }

    public function edit(){

        $model = $this->find($_POST['cid']); // 查找主键为1的数据
        $model->cname = $_POST['cname'];
        $model->ctitle = $_POST['ctitle'];
        $model->cdes = $_POST['cdes'];
        $model->ckeywords = $_POST['ckeywords'];
        $model->csort = $_POST['csort'];
        $model->pid = $_POST['pid'];
         $model->save();
      return true;
    }


//    public function del($cid){
//
//        $data=Db::table('category')->get();
//
//         $cids=$this->getSon($data,$cid);
//
//         $cids[]=$cid;
//
//        foreach ($cids as $k=>$v){
//
//            DB::table('category')->delete($v);
//        }
//        return true;
//    }
}