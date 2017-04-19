<?php
/**
 * 1.MangerController用来生成模块的目录和文件，
 *
 */

namespace Module\Controller;
use Common\Controller\BaseController;
use Common\Model\ModuleModel;

class MangerController extends BaseController{
    /**
     * ......函数lists主要将Addons里的文件名称
     * ......遍历到list.html页面上
     * 1.获取目录addons里的其中有minifest.php的合法文件
     * 2.获取配置文件minifes.php里的信息，
     * 3.将数据存在一个数组里，
     * 4，将数据遍历到list.html的页面上，
     */
    public function lists(){

        //1.获取Addons下的目录信息
         $data= glob('Addons/*');

         //2.检测目录文件下是否存在minifest.php文件

        $module=[];
        //<<声明一个数组来存合法信息>>

        foreach ($data as $f){

            //3.如果目录下有manifest.php文件的话
           if(file_exists($f.'/manifest.php')) {
               //4.则获取manifest.php里的配置信息
               $module[]= include $f.'/manifest.php';
           }

        }
        //dd($module);
        //5.将合法数据遍历到页面
        $this->assign('listData',$module);

        //6.获取module数据表里所有数据

         $has=m('module')->getField('title',true);

            // dd($has);
        $this->assign('has',$has);
        $this->display();
    }

    /**
     * 如何设计一个模块？
     * 1.加载模版,
     * 2。获取post提交的title数据，
     * 3.创建目录和文件 /首先要在resource扫描Data里的文件 如果没有自己创建一个 /
     *
     */

    public function design(){

        if(IS_POST){

            //dd($_POST);
            //1获取post里的title数据，
            $title=$_POST['title'];

             //2.检测是目录是否存在？
            if (is_dir('Addons/'.$title)){
                $this->error('模块已经存在!');die;
            }
            //3.用来创建目录和文件
            $this->createDir($title);
            //4.创建配置文件
            $this->createManifest($title);
            //5.成功提示
            $this->success('模块添加成功!',u('module/manger/lists'));die;
        }

        $this->display();
    }


    public function createDir($title){
        /**
         * 1.创建目录，2.复制文件
         */

         mkdir('Addons/'.$title,0777,true);

          $data=glob('resource/Data/*');

        foreach ( $data as $v){

           if (!is_dir($v)){
               //如果不是一个目录复制文件
               $files=file_get_contents($v);

               $suJu=  str_replace('{NAME}',$title,$files);

               file_put_contents('Addons/'.$title.'/'.basename($v),$suJu);
           }elseif(is_dir($v)){
               //如果是一个目录则创建目录
               mkdir('Addons/'.$title.'/'.basename($v),0777,true);
           }
        }

    }


    /**
     * 1.用正则/r/n切分数组，
     * 2.筛选数组，3.切分数组，
     * 4.重组数组，5.格式化数组，
     * 6.写入数据.
     */
    public function createManifest($title){

            // 1.用正则/r/n切分数组，
           $data= preg_split("#(\r|\n)#",$_POST['actions']);
            // 2.筛选数组
            $data=array_filter($data);
            // 3.切分数组，
            foreach ($data as $k=> $f){

                $data[$k]= explode('|',$f);
            }
            //4.重组数组，
            $actions=[
                'name'=>$_POST['name'],
                'title'=>$_POST['title'],
                'actions'=>$data,
            ];
        //5.格式化数组，
        $newActions= var_export($actions,true);

      $str=<<<str
<?php
return
{$newActions}
?>
str;
        //6.写入数组，
        file_put_contents('Addons/'.$title.'/'.'manifest.php',$str);
    }

    /**
     * 函数install主要是安装
     */
    public function install(){

        /**
         * 1.如何获取配置信息？
         * 2.上传到数据库？
         */

           $title= I('get.title');


             $data=[];
            foreach (glob('Addons/*') as $f){

                if(basename($f)==$title){

                    $data[]=include 'Addons/'.$title.'/manifest.php';
                }
            }
            $data = current($data);

               $data['actions']= json_encode($data['actions'],JSON_UNESCAPED_UNICODE);
             // dd($data);

               $this->store((new ModuleModel()),$data,function (){


               });

        }

    /**
     * 卸载模块
     */

        public function uninstall()
        {

            $data = I('get.title');


            (new ModuleModel())->where("title='{$data}'")->delete();

            $this->success('模块删除成功！', u('Module/manger/lists'));
            die;

        }
}
