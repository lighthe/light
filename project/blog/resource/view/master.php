<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>何辉博客网后台管理系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="resource/admin/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="resource/admin/css/site.css" rel="stylesheet">
	<link href="resource/admin/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="resource/admin/js/jquery.min.js"></script>
	<script src="resource/admin/bootstrap-3.3.0-dist/dist/js/bootstrap.min.js"></script>
    <script>
        var hdjs = {
            //框架目录
            'base': '/resource/hdjs',
            'uploader': "{{u('system/component/uploader')}}",
            'filesLists': "{{u('system/component/filesLists')}}",
            'removeImage': "{{u('system/component/removeImage')}}"
        };
    </script>
	<script src="resource/hdjs/app/util.js"></script>
	<script src="resource/hdjs/require.js"></script>
	<script src="resource/hdjs/app/config.js"></script>
	<!--[if lt IE 9]>
	<script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
	<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
	</script>
	<style>
		i {
			color: #337ab7;
		}
	</style>
</head>
<body>
<div class="container-fluid admin-top">
	<!--导航-->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="index.html" style="color: white;margin-left: -14px">何辉博客网后台管理系统</a>
				</h4>
				<div class="navbar-header">
					<ul class="nav navbar-nav">
						<li>
							<a href="http://doc.hdphp.com" target="_blank"><i class="fa fa-w fa-file-code-o"></i>
								在线文档</a>
						</li>
						<li>
							<a href="http://fontawesome.dashgame.com/" target="_blank"><i
									class="fa fa-w fa-hand-o-right"></i> 图标库</a>
						</li>
						<li>
							<a href="http://bbs.houdunwang.com" target="_blank"><i class="fa fa-w fa-forumbee"></i> 论坛讨论</a>
						</li>
					</ul>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
							<i class="fa fa-w fa-user"></i>
							{{Session::get('username')}}
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li role="separator" class="divider"></li>
							<li><a href="{{u('admin/common/signOut')}}">退出</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
			<div class="panel panel-default" id="menus">
				<!--分类管理-->
				<div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample"
					 aria-expanded="false" aria-controls="collapseExample"
					 style="border-top: 1px solid #ddd;border-radius: 0%">
					<h4 class="panel-title">分类管理</h4>
					<a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<i class="fa fa-chevron-circle-down"></i>
					</a>
				</div>
				<ul class="list-group menus collapse in" id="collapseExample">
					<a href="{{u('admin/category/index')}}" class="list-group-item">
						<i class="fa fa-male" aria-hidden="true"></i>
						<span class="pull-right" href=""></span>
						分类列表
					</a>
				</ul>
				<!--分类管理结束 end-->

				<div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2"
					 aria-expanded="false" aria-controls="collapseExample">
					<h4 class="panel-title">标签管理</h4>
					<a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
						<i class="fa fa-chevron-circle-down"></i>
					</a>
				</div>
				<ul class="list-group menus collapse in" id="collapseExample2">
					<a href="{{u('admin/tag/index')}}" class="list-group-item">
						<i class="fa fa-list-ol" aria-hidden="true"></i>
						<span class="pull-right" href=""></span>
						标签列表
					</a>

				</ul>

				<div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
					 aria-expanded="false" aria-controls="collapseExample">
					<h4 class="panel-title">文章管理</h4>
					<a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
						<i class="fa fa-chevron-circle-down"></i>
					</a>
				</div>
				<ul class="list-group menus collapse in" id="collapseExample3">
					<a href="{{u('admin/article/index')}}" class="list-group-item">
						<i class="fa fa-wrench" aria-hidden="true"></i>
						<span class="pull-right" href=""></span>
						文章列表
					</a>
                    <a href="{{u('admin/article/recycleIndex')}}" class="list-group-item">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        回收站
                    </a>
				</ul>

                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">友情链接管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample3">
                    <a href="{{u('admin/link/index')}}" class="list-group-item">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        友链列表
                    </a>
                </ul>

                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">网站配置管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample3">
                    <a href="{{u('admin/WebSet/index')}}" class="list-group-item">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        站点配置
                    </a>
                </ul>
			</div>
		</div>
		<!--右侧主体区域部分 start-->
		<div class="col-xs-12 col-sm-9 col-lg-10">

			<blade name="content"/>



		</div>
	</div>
	<!--右侧主体区域部分结束 end-->
</div>
</div>
<div class="master-footer" style="margin-top: 150px">
	<a href="http://www.houdunwang.com">哈哈哈</a>
	<a href="http://www.hdphp.com">开源框架</a>
	<a href="http://bbs.houdunwang.com">后盾论坛</a>
	<br>
	Powered by hdphp v2.0 © 2016-2022 www.hdphp.com
</div>
</body>
</html>
