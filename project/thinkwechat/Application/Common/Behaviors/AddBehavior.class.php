<?php

namespace Common\Behaviors;
use houdunwang\wechat\WeChat;

require "Application/Common/Common/helper.php";
class AddBehavior extends \Think\Behavior{
    //行为执行入口
    public function run(&$param){
         $data=m('config')->find(1);

        $this->setSystemConfig($data);
        $this->loadWechatConfig($data);
        /**
         *
         */
        define('MODULE',ucfirst(I('get.mo',null)));
    }
    private function setSystemConfig($data){

        $data['system'] = json_decode($data['system'],true);
            V('system',$data['system']);
    }

    private function loadWechatConfig($data){

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