<?php namespace Model\Controller;



use Common\Controller\BaseController;
use Common\Model\ModuleModel;


class MangerController extends BaseController {



    public function lists(){

        $data=glob('Addons/*');
            //dd($data);
            $module=[];
            foreach ($data as $m=>$n){

                if(file_exists($n.'./manifest.php')){

                    $module[]= include $n.'./manifest.php';
                }
            }
            $has= m('module')->getField('title',true);
            // dd($has);
            $this->assign('has',$has);
             $this->assign('module',$module);
            $this->display();
    }


            public function design(){

            if(IS_POST){

                $title=$_POST['title'];
                //1.模块不能重复
               if(is_dir('Addons/'.$title)){
                   $this->error('模块已经存在！');die;
               }
                //2.生成目录
                $this->createDir($title);
                //3.创建配置文件
                $this->createManifest($title);
                //4.成功提示
                $this->success('模版加载成功！',u('lists')); die;
            }

                $this->display();
            }

    /** 生成目录
     * @param $title
     *
     */
            public function createDir($title)
            {

                mkdir('Addons/'.$title,0777,true);
                $res = glob('resource/Data/*');
                foreach ($res as $v) {
                    $files = file_get_contents($v);
                    $str = str_replace('{NAME}', $title, $files);
                   file_put_contents('Addons/'.$title.'/'.basename($v),$str);
                }

            }


        public function createManifest($title){

                $data=preg_split("@(\r|\n)@",$_POST['actions']);
                //dd($data);
                $data= array_filter($data);

            foreach ($data as $k=>$v){

                    $data[$k]=explode('|',$v);
            }

            $arrS=[
                "name"=>$_POST['name'],
                "title"=>$_POST['title'],
                "message"=>$_POST['message'],
                "actions"=>$data
            ];

            $arrS= var_export($arrS,true);
            file_put_contents("Addons/".$title.'/'.'manifest.php',"<?php\r\n return ".$arrS.";?>");
        }


        public function install(){


            $title= $_GET['title'];
        if(m('module')->where("title='{$title}'")->find()){

            $this->error('模块已经安装！');exit;
        }

                $data=include "Addons/{$title}/manifest.php";
                $data['actions']=json_encode($data['actions'],JSON_UNESCAPED_UNICODE);

                $this->store(new ModuleModel(),$data);
        }

        public function uninstall(){

                $title= $_GET['title'];
               if((new ModuleModel())->where("title='{$title}'")->delete()){

                   $this->success('卸载成功');exit;
               }else{
                   $this->error('卸载失败');exit;
               }
        }
}
