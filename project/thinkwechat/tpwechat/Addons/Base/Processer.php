<?php
namespace Addons\Base;


use Addons\HdProcesser;

class Processer extends HdProcesser{



    public function handler(){


       $data= m('base_text')->find(1);

       if($this->message->isSubscribeEvent()){

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