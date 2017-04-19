<?php

/**
 * 打印函数
 * @param $var  打印数据
 */
function dd($var){
    echo "<pre style='padding: 15px;background: #ccc;border-radius: 6px'>";
    if(is_null($var)){
        var_dump($var);
    }elseif(is_bool($var)){
        var_dump($var);
    }else{
        print_r($var);
    }
    echo '</pre>';
}

if( !function_exists('v') ){


            function v( $name = null, $value = '[null]' ) {
                static $vars = [ ];
                 // dd($name);
                if ( is_null( $name ) ) {
                    return $vars;
                } else if ( $value == '[null]' ) {
                    //取变量
                    $tmp = $vars;
                    foreach ( explode( '.', $name ) as $d ) {
                        if ( isset( $tmp[ $d ] ) ) {

                            $tmp = $tmp[ $d ];
                        } else {
                            return null;
                        }
                    }

                    return $tmp;
                } else {
                    //设置
                    $tmp = &$vars;

                    foreach ( explode( '.', $name ) as $d ) {

                        if ( ! isset( $tmp[ $d ] ) ) {
                            //dd(1);
                            $tmp[ $d ] = [ ];

                        }
                        $tmp = &$tmp[ $d ];
                    }

                    return $tmp = $value;
                }
            }
}

/**
 * 前台跳转模块
 * @param $url
 * @param array $args
 * @return string
 */

function web_url($url,$args = []){
    ///?mo=show&ac=show&t=web&id=1&cid=2
        //dd($url);
        //dd($args);
        $url=explode('.',$url);
        //dd($url);

          return  $path= __APP__."?mo={$url[0]}&ac={$url[1]}&t=web&".http_build_query($args);

}

/**
 * 后台跳转模块
 * @param $url
 * @param array $args
 * @return string
 */
function site_url($url,$args=[]){

        $url=explode('.',$url);

    return  $path= __APP__. "?mo={$url[0]}&ac={$url[1]}&t=site&".http_build_query($args);
}