<?php namespace Model\Controller;


use houdunwang\wechat\build\cash;
use Think\Controller;

class IndexController extends Controller
{


    public function index()
    {

            $mo=isset($_GET['mo']) ? ucfirst($_GET['mo']) : 'base';
             $ac=isset($_GET['ac'])?ucfirst($_GET['ac']):'show';
              $t = isset($_GET['t']) ? $_GET['t'] : 'web';
            switch ($t){

                case 'site':
                    $name="Addons\\{$mo}\site";
                    break;
                default:
                    $name="Addons\\{$mo}\web";
                break;
            }

            $obj=  new $name;
             $obj->$ac();
    }
}
