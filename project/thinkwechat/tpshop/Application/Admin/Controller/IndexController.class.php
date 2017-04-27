<?php namespace Admin\Controller;





use Common\Controller\BaseController;


class IndexController extends BaseController {

    //实例化数据库
    protected function _model(){
        return new \Think\Model();
    }

    //首先加载
    public function index(){
        //用户信息
        $userinfo= m('username')->find(1);
        $this->assign('userifo',$userinfo);

        //系统信息
       $data= array(
            'os' => $_SERVER["SERVER_SOFTWARE"], //获取服务器标识的字串
            'version' => PHP_VERSION, //获取PHP服务器版本
            'time' => date("Y-m-d H:i:s", time()), //获取服务器时间
            'pc' => $_SERVER['SERVER_NAME'], //当前主机名
            'osname' => php_uname(), //获取系统类型及版本号
            'language' => $_SERVER['HTTP_ACCEPT_LANGUAGE'], //获取服务器语言
            'port' => $_SERVER['SERVER_PORT'], //获取服务器Web端口
            'max_upload' => ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled", //最大上传
            'max_ex_time' => ini_get("max_execution_time")."秒", //脚本最大执行时间
            'mysql_version' => $this->_mysql_version(), //数据库版本

        );
        $this->assign('UserData',$data);
        $this->display();

    }

    //数据库版本
    private function _mysql_version()
    {
        $Model = self::_model();
        $version = $Model->query("select version() as ver");
        return $version[0]['ver'];
    }





}

