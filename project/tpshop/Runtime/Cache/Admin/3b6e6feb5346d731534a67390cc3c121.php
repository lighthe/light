<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>Notebook | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="/Public/Backstage/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Backstage/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Backstage/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Backstage/css/font.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Backstage/js/calendar/bootstrap_calendar.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Backstage/css/app.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="/Public/Backstage/js/ie/html5shiv.js"></script>
    <script src="/Public/Backstage/js/ie/respond.min.js"></script>
    <script src="/Public/Backstage/js/ie/excanvas.js"></script>
    <!--<![endif]&ndash;&gt;-->
    <script>
        //模块配置项
        var hdjs = {
            //框架目录
            'base': '/node_modules/hdjs',
            //上传文件后台地址
            'uploader': "<?php echo u('system/component/uploader');?>",
            //获取文件列表的后台地址
            'filesLists': "<?php echo u('system/component/filesLists');?>",
        };
    </script>
    <script src="/node_modules/hdjs/app/util.js"></script>
    <script src="/node_modules/hdjs/require.js"></script>
    <script src="/node_modules/hdjs/config.js"></script>
    <!--注意jquery 放在这里-->
    <script src="/Public/Backstage/js/jquery.min.js"></script>
</head>
<body class="">
<section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
        <div class="navbar-header aside-md">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                <i class="fa fa-bars"></i>
            </a>
            <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="/Public/Backstage/images/logo.png" class="m-r-sm">后台管理系统</a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                <i class="fa fa-cog"></i>
            </a>
        </div>
        <ul class="nav navbar-nav hidden-xs">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
                    <i class="fa fa-home"></i>
                    <span class="font-bold">网站前台</span>
                </a>
            </li>
            <li>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
            <li class="hidden-xs">

                <section class="dropdown-menu aside-xl">
                    <section class="panel bg-white">
                        <header class="panel-heading b-light bg-light">
                            <strong>You have <span class="count">2</span> notifications</strong>
                        </header>
                        <div class="list-group list-group-alt animated fadeInRight">
                            <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="/Public/Backstage/images/avatar.jpg" alt="John said" class="img-circle">
                  </span>
                                <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                            </a>
                            <a href="#" class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                            </a>
                        </div>
                        <footer class="panel-footer text-sm">
                            <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                            <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                        </footer>
                    </section>
                </section>
            </li>
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a>
                <section class="dropdown-menu aside-xl animated fadeInUp">
                    <section class="panel bg-white">
                        <form role="search">
                            <div class="form-group wrapper m-b-none">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-icon"><i class="fa fa-search"></i></button>
                    </span>
                                </div>
                            </div>
                        </form>
                    </section>
                </section>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="/Public/Backstage/images/avatar.jpg">
            </span>
                    <?php echo v('user.username');?><b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInRight">
                    <span class="arrow top"></span>

                    <li>
                        <a href="docs.html">Help</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo u('admin/login/setout');?>"  >退出</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-dark lter aside-md hidden-print hidden-xs" id="nav">
                <section class="vbox">

                    <section class="w-f scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

                            <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav">

                                    <li >
                                        <a href="#uikit"  >
                                            <i class="fa fa-flask icon">
                                                <b class="bg-success"></b>
                                            </i>
                                            <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                                            <span>商品管理</span>
                                        </a>
                                        <ul class="nav lt">

                                            <li >
                                                <a href="#form" >
                                                    <i class="fa fa-angle-down text"></i>
                                                    <i class="fa fa-angle-up text-active"></i>
                                                    <span>商品管理</span>
                                                </a>
                                                <ul class="nav bg">
                                                    <li >
                                                        <a href="<?php echo u('admin/goods/index');?>" >
                                                            <i class="fa fa-angle-right"></i>
                                                            <span>商品列表</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li >
                                                <a href="#form" >
                                                    <i class="fa fa-angle-down text"></i>
                                                    <i class="fa fa-angle-up text-active"></i>
                                                    <span>品牌管理</span>
                                                </a>
                                                <ul class="nav bg">
                                                    <li >
                                                        <a href="<?php echo u('admin/logo/index');?>" >
                                                            <i class="fa fa-angle-right"></i>
                                                            <span>品牌列表</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li >
                                                <a href="#form" >
                                                    <i class="fa fa-angle-down text"></i>
                                                    <i class="fa fa-angle-up text-active"></i>
                                                    <span>分类管理</span>
                                                </a>
                                                <ul class="nav bg">
                                                    <li >
                                                        <a href="<?php echo u('admin/category/index');?>" >
                                                            <i class="fa fa-angle-right"></i>
                                                            <span>分类列表</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li >
                                                <a href="#form" >
                                                    <i class="fa fa-angle-down text"></i>
                                                    <i class="fa fa-angle-up text-active"></i>
                                                    <span>类型管理</span>
                                                </a>
                                                <ul class="nav bg">
                                                    <li >
                                                        <a href="<?php echo u('Admin/type/index');?>" >
                                                            <i class="fa fa-angle-right"></i>
                                                            <span>类型列表</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="#pages"  >
                                            <i class="fa fa-file-text icon">
                                                <b class="bg-primary"></b>
                                            </i>
                                            <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                                            <span>订单管理</span>
                                        </a>
                                        <ul class="nav lt">
                                            <li >
                                                <a href="gallery.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Gallery</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="profile.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li >
                                        <a href="#pages"  >
                                            <i class="fa fa-file-text icon">
                                                <b class="bg-primary"></b>
                                            </i>
                                            <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                                            <span>评论管理</span>
                                        </a>
                                        <ul class="nav lt">
                                            <li >
                                                <a href="gallery.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Gallery</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="profile.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li >
                                        <a href="#pages"  >
                                            <i class="fa fa-file-text icon">
                                                <b class="bg-primary"></b>
                                            </i>
                                            <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                                            <span>广告管理</span>
                                        </a>
                                        <ul class="nav lt">
                                            <li >
                                                <a href="gallery.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Gallery</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="profile.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li >
                                        <a href="#pages"  >
                                            <i class="fa fa-file-text icon">
                                                <b class="bg-primary"></b>
                                            </i>
                                            <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                                            <span>用户管理</span>
                                        </a>
                                        <ul class="nav lt">
                                            <li >
                                                <a href="gallery.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Gallery</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="profile.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li >
                                        <a href="#pages"  >
                                            <i class="fa fa-file-text icon">
                                                <b class="bg-primary"></b>
                                            </i>
                                            <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                                            <span>系统设置</span>
                                        </a>
                                        <ul class="nav lt">
                                            <li >
                                                <a href="gallery.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Gallery</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="profile.html" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <!-- / nav -->
                        </div>
                    </section>

                    <footer class="footer lt hidden-xs b-t b-dark">
                        <div id="chat" class="dropup">
                            <section class="dropdown-menu on aside-md m-l-n">
                                <section class="panel bg-white">
                                    <header class="panel-heading b-b b-light">Active chats</header>
                                    <div class="panel-body animated fadeInRight">
                                        <p class="text-sm">No active chats.</p>
                                        <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                                    </div>
                                </section>
                            </section>
                        </div>
                        <div id="invite" class="dropup">
                            <section class="dropdown-menu on aside-md m-l-n">
                                <section class="panel bg-white">
                                    <header class="panel-heading b-b b-light">
                                        John <i class="fa fa-circle text-success"></i>
                                    </header>
                                    <div class="panel-body animated fadeInRight">
                                        <p class="text-sm">No contacts in your lists.</p>
                                        <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                                    </div>
                                </section>
                            </section>
                        </div>
                        <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                            <i class="fa fa-angle-left text"></i>
                            <i class="fa fa-angle-right text-active"></i>
                        </a>
                        <div class="btn-group hidden-nav-xs">
                        </div>
                    </footer>
                </section>
            </aside>
            <!-- /.aside -->
            <section id="content">
                <section class="vbox">
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-list-ul"></i> Elements</a></li>
                        <li class="active">Components</li>
                    </ul>
                    

<div class="col-lg-12">


    <div class="panel panel-default">

        <div class="panel-heading">
          类型列表
        </div>
        <div class="panel-heading">
            <div class="btn-group">
                <a  href="<?php echo u('admin/type/add');?>" type="button" class="btn btn-success">添加类型</a>
            </div>
        </div>
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>tid</th>
                    <th>类型名称</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
        <?php if(is_array($Typedata)): $i = 0; $__LIST__ = $Typedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo['tid']); ?></td>

                    <td><?php echo ($vo['tname']); ?></td>

                    <td>

                        <div class="btn-group">

                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">操作 <span class="caret"></span></button>

                            <ul class="dropdown-menu dropdown-menu-right">

                                <li><a href="<?php echo u('admin/type/type',['tid'=>$vo['tid']]);?>">类型属性</a></li>

                                <li class="divider"></li>

                                <li><a href="<?php echo u('admin/type/add',['tid'=>$vo['tid']]);?>">编辑</a></li>

                                <li class="divider"></li>

                                <li><a href="<?php echo u('admin/type/del',['tid'=>$vo['tid']]);?>">删除</a></li>

                            </ul>

                        </div>

                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>
        <?php echo ($page); ?>
</div>

                </section>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
            </section>
            <aside class="bg-light lter b-l aside-md hide" id="notes">
                <div class="wrapper">Notification</div>
            </aside>
        </section>

    </section>
</section>

<!-- Bootstrap -->
<script src="/Public/Backstage/js/bootstrap.js"></script>
<!-- App -->
<script src="/Public/Backstage/js/app.js"></script>
<!--<script src="/Public/Backstage/js/slimscroll/jquery.slimscroll.min.js"></script>-->
<!--<script src="/Public/Backstage/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>-->
<!--<script src="/Public/Backstage/js/charts/sparkline/jquery.sparkline.min.js"></script>-->
<!--<script src="/Public/Backstage/js/charts/flot/jquery.flot.min.js"></script>-->
<!--<script src="/Public/Backstage/js/charts/flot/jquery.flot.tooltip.min.js"></script>-->
<!--<script src="/Public/Backstage/js/charts/flot/jquery.flot.resize.js"></script>-->
<!--<script src="/Public/Backstage/js/charts/flot/jquery.flot.grow.js"></script>-->
<!--<script src="/Public/Backstage/js/charts/flot/demo.js"></script>-->

<!--<script src="/Public/Backstage/js/calendar/bootstrap_calendar.js"></script>-->
<!--<script src="/Public/Backstage/js/calendar/demo.js"></script>-->

<!--<script src="/Public/Backstage/js/sortable/jquery.sortable.js"></script>-->
<!--<script src="/Public/Backstage/js/app.plugin.js"></script>-->
</body>
</html>