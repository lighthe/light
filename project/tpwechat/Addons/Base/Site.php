<?php namespace Addons\Base;
use Addons\Base\Model\BaseTextModel;
use Addons\Module;
class Site extends Module
{


    public function system(){


        if (IS_POST){


            $data=I('post.');
            $data['id']=1;
            $this->store((new BaseTextModel()),$data);
        }

        //分配旧数据
        $field= m('base_text')->find(1);
        $this->assign('field',$field);
        $this->make();
    }


}