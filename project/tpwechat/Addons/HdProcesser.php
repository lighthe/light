<?php namespace Addons;



use houdunwang\wechat\WeChat;

class HdProcesser{


    protected $message;


    public function __construct()
    {

      $this->message = (New WeChat())->instance('message');
    }


}
