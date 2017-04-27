<?php namespace Wechat\Controller;



use houdunwang\wechat\WeChat;

class ApiController{



    public function __construct()
    {
        (new WeChat())->valid();
    }


    public function show(){


        $this->send('base');

    }


    public function send($module){
        $class= '\Addons\\'.$module.'\Processer';

        (new $class)->handler();
    }
}
