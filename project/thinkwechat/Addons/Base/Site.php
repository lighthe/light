<?php   namespace Addons\base;

use Addons\Base\Model\BaseTextModel;
use Addons\Module;

class Site extends Module {

    public function base(){

        if(IS_POST){
            $data=I('post.');
                //dd($data);
            if(m('base_text')->find(1)){
                $data['id']=1;
            }
            $this->store( (new BaseTextModel()),$data);
        }

        $data=m('base_text')->find(1);
       // dd($data);
        $this->assign('field',$data);
        $this->make();
    }
}
