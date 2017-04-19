<?php namespace Addons\Base;

use Addons\HdProcesser;

class Processer extends HdProcesser{


    public function handler()
    {
//先在数据库查找数据
        $data = m('base_text')->find(1);
        //dd($data);die;
        //测试微信关注回复和默认回复
        //消息管理模块
        //判断是否是关注事件
        //dd($data);
        if ($this->message->isSubscribeEvent())
        {
            //向用户回复消息
            $this->message->text($data['system']);
        }
        //消息回复
        if ($this->message->isTextMsg())
        {
            //向用户回复消息
            $this->message->text($data['default']);
        }
    }

}
