<?php
namespace Addons;


use Common\Controller\BaseController;

class Module extends BaseController{



    public function make($tpl=''){

        $tpl= $tpl ? $tpl :$_GET['ac'];
        //没有传参，使用跟方法同名的模板文件，【方法名称：$_GET['ac']】
        $this->display('Addons/'.ucfirst($_GET['mo'])."/View/{$tpl}.html");
    }
}
