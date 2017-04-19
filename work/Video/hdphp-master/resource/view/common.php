<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<!--这里干什么用？-->
<meta name="csrf-token" content="{{csrf_token()}}">
<!--如果不加这一部 需要在配置文件中修改-->
<script>
    //模块配置项
    var hdjs = {
        //框架目录
        'base': 'node_modules/hdjs',
        //上传文件后台地址
        'uploader': '?s=system/component/uploader',
        //获取文件列表的后台地址
        'filesLists': '?s=system/component/filesLists',
    };
</script>


<script src="node_modules/hdjs/app/util.js"></script>
<script src="node_modules/hdjs/require.js"></script>
<script src="node_modules/hdjs/config.js"></script>
