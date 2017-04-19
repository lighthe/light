<?php namespace Module\Controller;

use Think\Controller;

/**
 * EntryController.是我们做的一个跳板，
 * 用来跳进我们自己做的模块。
 *.................................
 * 注意入口index.php文件加载
 * require "vendor/autoload.php";
 * 要放在框架加载之前！！！！
 */
class EntryController extends Controller {


    public function index(){

        /**
         * 如何跳入Addons里的模块？
         * 1.实例化Addons里的模型
         */
              // dd(1);


            $mo=isset($_GET['mo'])?ucfirst($_GET['mo']):'Shop';
            $ac=isset($_GET['ac'])?$_GET['ac']:'show';

            switch ($_GET['t']){
                case  'site':
                    $name="\Addons\\{$mo}\site";
                    break;
                default :
                    $name="Addons\\{$mo}\web";
                  break;
            }
            $obj=new $name;
            $obj->$ac();
    }


}