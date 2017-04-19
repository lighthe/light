<?php namespace Wechat\Controller;

use Common\Controller\BaseController;
use houdunwang\wechat\WeChat;

class ApiController extends BaseController{


        public function __init(){

            (new WeChat())->valid();
        }

        public function show(){

//           $instance =(new WeChat())->instance('message');
//
//            $message=$instance->getMessage();
//            $res= $message->Content;
//           if($data=m('keyword')->where("keyword='{$res}'")->find()){
//
//              $content= m('text_content')->where("kid={$data['kid']}")->getField('content');
//
//               $instance->text('后盾网收到你的消息了...:' . $content);
//           }else{
//               $this->send('base');
//           }
            $instance =(new WeChat())->instance('message');
            //获取消息内容
            $message = $instance->getMessage();
            $content = $message->Content;
            //file_put_contents('./data.php',var_export($message,true));
            if($data = m('keyword')->where("keyword='{$content}'")->find())
            {
                //说明有这个关键词
                $content = m('text_content')->where("kid={$data['kid']}")->getField('content');
                //回复给粉丝
                //向用户回复消息
                $instance->text('后盾网收到你的消息了...:' . $content);
            }else{
                //找不到关键词
                $this->send('base');
            }
        }

        public function send($module){

            $class='\Addons\\'.ucfirst($module).'\Processer';
            (new $class)->handler();
        }
}
