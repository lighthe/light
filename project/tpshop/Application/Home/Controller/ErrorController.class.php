<?php
namespace Home\Controller;



use Common\Controller\HomeController;

class ErrorController extends HomeController{


    public function index(){

        $url=u('Home/index/index');
        $this->assign('url',$url);
        $this->display();
    }

}