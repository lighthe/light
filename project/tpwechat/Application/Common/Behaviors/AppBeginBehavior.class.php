<?php namespace Common\Behaviors;

use houdunwang\wechat\WeChat;

require "Application/Common/Common/helper.php";

class AppBeginBehavior extends \Think\Behavior{


    public function run(&$param){

            $data=m('config')->find(1);

            $data['system']=json_decode($data['system'],true);

           $this->setSystemConfig($data);

           $this->loadWechatConfig($data);

             define('MODULE',I('get.mo'));


    }

    public function setSystemConfig($data){

           v('system',$data['system']) ;
    }

    public function loadWechatConfig($data){



        $data['wechat']=json_decode($data['wechat'],true);
        v('wechat',$data['wechat']);
        $config = [
            //微信首页验证时使用的token http://mp.weixin.qq.com/wiki/8/f9a0b8382e0b77d87b3bcc1ce6fbc104.html
            "token"          => v('wechat.token'),
            //公众号身份标识
            "appid"          => v('wechat.appid'),
            //公众平台API(参考文档API 接口部分)的权限获取所需密钥Key
            "appsecret"      => v('wechat.appsecret'),
        ];
        //dd($config);

        new WeChat($config);
    }



}
