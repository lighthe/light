<?php

/**
 * 打印数据
 * @param $var 要打印的内容
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



if ( ! function_exists( 'v' ) ) {
    /**
     * 全局变量
     *
     * @param null $name 变量名
     * @param string $value 变量值
     *
     * @return array|mixed|null|string
     */
function v( $name = null, $value = '[null]' ) {
    static $vars = [ ];
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
                $tmp[ $d ] = [ ];
            }
            $tmp = &$tmp[ $d ];
        }
        return $tmp = $value;
    }
}
}

/**
 * 前台跳转函数
 *
 */

function Web_url($data,$arr=[]){



     $url=explode('.',$data);

     return $path= 'http://c79_hehui.kuaipinwang.com/tpwechat/index.php?'.'mo='.$url['0'].'&ac='.$url['1'].'&t=web&'.http_build_query($arr);

}


/**
 * 后台跳转函数
 */

function Site_url($data,$arr=[]){

      
    $url=explode('.',$data);

    return $path= 'http://c79_hehui.kuaipinwang.com/tpwechat/index.php?'.'mo='.$url['0'].'&ac='.$url['1'].'&t=site&'.http_build_query($arr);
}