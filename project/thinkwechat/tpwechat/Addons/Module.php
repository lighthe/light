<?php namespace Addons;


use Common\Controller\BaseController;

class Module extends BaseController{


    /**
     * 公共方法类
     * 用来加载模版
     * @param string $tpl
     */
    public function make($tpl=''){


          $tpl  =  $tpl ? $tpl:$_GET['ac'];

        $this->display('Addons/'.ucfirst($_GET['mo']).'/View/'.$tpl.'.html');
    }




}
