<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8"/>
    <title>后台管理 | 后盾人</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="/tpwechat/Public/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="/tpwechat/Public/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="/tpwechat/Public/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="/tpwechat/Public/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="/tpwechat/Public/js/calendar/bootstrap_calendar.css" type="text/css"/>
    <link rel="stylesheet" href="/tpwechat/Public/js/jvectormap/jquery-jvectormap-1.2.2.css" type="text/css"/>
    <link rel="stylesheet" href="/tpwechat/Public/css/app.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="/tpwechat/Public/js/ie/html5shiv.js"></script>
    <script src="/tpwechat/Public/js/ie/respond.min.js"></script>
    <script src="/tpwechat/Public/js/ie/excanvas.js"></script>
    <![endif]-->
    <script>
        //配置后台地址
        var hdjs = {
            'base': '/tpwechat/node_modules/hdjs',
            'ueditor':'',
            'uploader': '/admin/Component/uploader',
            'filesLists': '/admin/Component/filesLists',
            'removeImage': '删除图片后台地址'
        };
    </script>
    <!--<script src="/node_modules/hdjs/app/util.js"></script>-->
    <script src="/tpwechat/node_modules/hdjs/require.js"></script>
    <script src="/tpwechat/node_modules/hdjs/config.js"></script>
</head>
<style>
    .ng-cloak { display : none; }
</style>
<body ng-cloak class="ng-cloak" ng-controller="ctrl">
<section class="vbox">
    <header class="bg-black dk header navbar navbar-fixed-top-xs">
        <div class="navbar-header aside-md">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                <i class="fa fa-bars"></i>
            </a>
            <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="/tpwechat/Public/images/logo.png" class="m-r-sm"><?php echo v('system.webname');?></a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                <i class="fa fa-cog"></i>
            </a>
        </div>
        <ul class="nav navbar-nav hidden-xs">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
                    <i class="fa fa-wordpress"></i>
                    <span class="font-bold"> 文章管理</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
                    <i class="fa fa-paper-plane"></i>
                    <span class="font-bold"> 文章管理</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
                    <i class="fa fa-building-o"></i>
                    <span class="font-bold"> 配置管理</span>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
            <li class="hidden-xs">
                <a href="#" class="dropdown-toggle dk" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-sm up bg-danger m-l-n-sm count">2</span>
                </a>
                <section class="dropdown-menu aside-xl">
                    <section class="panel bg-white">
                        <header class="panel-heading b-light bg-light">
                            <strong>You have <span class="count">2</span> notifications</strong>
                        </header>
                        <div class="list-group list-group-alt animated fadeInRight">
                            <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="/tpwechat/Public/images/avatar.jpg" alt="John said" class="img-circle">
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
              <img src="/tpwechat/Public/images/avatar.jpg">
            </span>
                    武斌 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInRight">
                    <span class="arrow top"></span>
                    <li>
                        <a href="#">我的资料</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="modal.lockme.html" data-toggle="ajaxModal">退出</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-light lter b-r aside-md hidden-print hidden-xs" id="nav">
                <section class="vbox">
                    <header class="header bg-primary lter text-center clearfix">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-dark btn-icon" title="New project"><i class="fa fa-plus"></i></button>
                            <div class="btn-group hidden-nav-xs">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                    快捷导航
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu text-left">
                                    <li><a href="#">网站配置</a></li>
                                    <li><a href="#">公众号设置</a></li>
                                </ul>
                            </div>
                        </div>
                    </header>
                    <section class="w-f scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

                            <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav">
                                    <li class="active">
                                        <a href="index.html" class="active">
                                            <i class="fa fa-dashboard icon">
                                                <b class="bg-danger"></b>
                                            </i>
                                            <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                                            <span>基本设置</span>
                                        </a>
                                        <ul class="nav lt">
                                            <li>
                                                <a href="<?php echo u('admin/Config/index');?>">
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>网站配置</span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="<?php echo U('admin/wx/set');?>" class="active">
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>公众号配置</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#layout">
                                            <i class="fa fa-columns icon">
                                                <b class="bg-warning"></b>
                                            </i>
                                            <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                                            <span>模块管理</span>
                                        </a>
                                        <ul class="nav lt">
                                            <li>
                                                <a href="<?php echo u('module/Manger/design');?>">
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>设计模块</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo u('module/Manger/lists');?>">
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>模块列表</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                   <?php if(is_array($_module)): $i = 0; $__LIST__ = $_module;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                            <a href="#uikit">
                                                <i class="fa fa-flask icon">
                                                    <b class="bg-success"></b>
                                                </i>
                                                <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                                                <span><?php echo ($vo['name']); ?></span>
                                            </a>
                                            <ul class="nav lt">
                                            <?php if(is_array($vo['actions'])): $i = 0; $__LIST__ = $vo['actions'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
                                                        <a href="<?php echo Site_url($vo['title'].'.'.$vv['1']);?>">
                                                            <i class="fa fa-angle-right"></i>
                                                            <span><?php echo ($vv['0']); ?></span>
                                                        </a>
                                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

                                                    <?php if($vo['message']==1): ?><li >
                                                        <a href="<?php echo u('module/keyword/lists',['mo'=>$vo['title']]);?>">
                                                            <i class="fa fa-angle-right"></i>
                                                            <span>关键词</span>
                                                        </a>
                                                    </li><?php endif; ?>
                                            </ul>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </nav>
                            <!-- / nav -->
                        </div>
                    </section>

                    <footer class="footer lt hidden-xs b-t b-light">
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
                        <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-light btn-icon">
                            <i class="fa fa-angle-left text"></i>
                            <i class="fa fa-angle-right text-active"></i>
                        </a>
                        <div class="btn-group hidden-nav-xs">
                            <i class="fa fa-user-md"></i> <?php echo v('system.tel');?>
                            <!--<button type="button" title="Chats" class="btn btn-icon btn-sm btn-light" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button>-->
                            <!--<button type="button" title="Contacts" class="btn btn-icon btn-sm btn-light" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button>-->
                        </div>
                    </footer>
                </section>
            </aside>
            <!-- /.aside -->

            <section id="content">
                <section class="vbox">
                    <section class="scrollable padder">
                        
<style>
    .mobile {
        border: 1px solid #cccccc;
        height: 500px;
        display: flex;
    }
    .mobile dl {
        padding: 0px;
        margin: 0px;
        display: flex;
        flex-direction: column-reverse;
        flex: 1;
    }
    .mobile dl dt {
        background: #cccccc;
        text-align: center;
        height: 30px;
        line-height: 2em;
        border: 1px solid #f3f3f3;
    }
    .mobile dl dd {
        display: flex;
        flex-direction: column;
    }
    .mobile dl dd a {
        padding: 6px;
        border: 1px solid #f3f3f3;
        text-align: center;
        text-decoration: none;
    }
    .topMenu,
    .subMenu {
        position: relative;
    }
    .topMenu .top,
    .subMenu .top,
    .topMenu .sub,
    .subMenu .sub {
        position: absolute;
        right: -10px;
        top: -10px;
        display: none;
        cursor: pointer;
    }
    .topMenu:hover .top,
    .subMenu:hover .sub {
        display: block;
    }
</style>
<form action="" method="POST" class="form-horizontal" role="form">
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <div class="mobile">
                    <dl ng-repeat="(k,v) in data.button">
                        <dt ng-bind="v.name"></dt>
                        <dd>
                            <a href="" ng-repeat="(m,n) in v.sub_button" ng-bind="n.name"></a>
                        </dd>
                    </dl>

                </div>
            </div>
            <div class="col-xs-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">编辑</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">菜单名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="<?php echo ($oldData['title']); ?>">
                            </div>
                        </div>
                        <!--一级菜单开始-->
                        <div class="panel panel-default topMenu" ng-repeat="(k,v) in data.button">
                            <i class="fa fa-times-circle fa-2x top" ng-click="removeTopMenu(v)"></i>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">标题</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" ng-model="v.name">
                                    </div>
                                </div>
                                <div class="form-group" ng-if="!v.sub_button || v.sub_button.length==0">
                                    <label for="" class="col-sm-2 control-label">类型</label>
                                    <div class="col-sm-10">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" ng-model="v.type" ng-value="'click'">关键字
                                            </label>
                                            <label>
                                                <input type="radio" ng-model="v.type" ng-value="'view'">url
                                            </label>
                                        </div>
                                        <!--{{v.type}}-->
                                    </div>
                                </div>
                                <!--{{v.sub_button}}-->
                                <div class="form-group" ng-if="v.type=='click' &&  (!v.sub_button || v.sub_button.length==0)">
                                    <label for="" class="col-sm-2 control-label">关键字</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" ng-model="v.key">
                                    </div>
                                </div>
                                <div class="form-group" ng-if="v.type=='view' && (!v.sub_button || v.sub_button.length==0)">
                                    <label for="" class="col-sm-2 control-label">url</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" ng-model="v.url">
                                    </div>
                                </div>
                                <!--二级开始-->
                                <div class="panel panel-default subMenu" ng-repeat="(m,n) in v.sub_button">
                                    <i class="fa fa-times-circle fa-2x sub" ng-click="removeSubMenu(v,n)"></i>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label">标题</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="n.name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label">类型</label>
                                            <div class="col-sm-10">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" ng-model="n.type" ng-value="'click'">关键字
                                                    </label>
                                                    <label>
                                                        <input type="radio" ng-model="n.type" ng-value="'view'">url
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" ng-if="n.type=='click'">
                                            <label for="" class="col-sm-2 control-label">关键字</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="n.key">
                                            </div>
                                        </div>
                                        <div class="form-group" ng-if="n.type=='view'">
                                            <label for="" class="col-sm-2 control-label">url</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="n.url">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--二级结束-->
                                <button type="button" ng-click="addSubMenu(v)" class="btn btn-info">添加二级菜单</button>
                            </div>
                        </div>
                        <!--一级结束-->
                        <button type="button" ng-click="addTopMenu()" class="btn btn-success">添加一级菜单</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-group">
        <input type="text" hidden name="content" value="{{data}}">
        <button type="submit" class="btn btn-success">确定提交</button>
    </div>
</form>


<script>
    function controller($scope, $, _) {
        $scope.data = {"button":[]};
        //添加顶级菜单
        $scope.addTopMenu = function(){
            var html = {
                "type":"",
                "name":"",
                "key":""
            };
            if($scope.data.button.length==3){
                alert('一级菜单最多添加三个')
            }else{
                $scope.data.button.push(html);
            }
        }
        //添加二级菜单
        //topMenue【一级】是把二级添加到那个一级菜单去
        $scope.addSubMenu = function(topMenu){
            var html = {
                "type":"",
                "name":"",
                "key":""
            };
            //如果没有sub_button,先创造出来一个
            if(!topMenu.sub_button)(topMenu.sub_button=[]);
            if(topMenu.sub_button.length==5){
                alert('二级菜单最多添加五个');
            }else{
                topMenu.sub_button.push(html);
            }
        }
        //删除一级菜单
        $scope.removeTopMenu = function(topMenu){
            //_.without(array, *values)
            //返回一个删除所有values值后的 array副本
            $scope.data.button = _.without($scope.data.button,topMenu);
        }
        //删除二级菜单
        //topMenu 以及菜单数组数据
        //subMenu  topMenu下面的二级菜单的数组数据
        $scope.removeSubMenu = function(topMenu,subMenu){
            topMenu.sub_button =_.without(topMenu.sub_button,subMenu);
        }
    }
</script>
                    </section>
                </section>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
            </section>
        </section>
    </section>
</section>
<script>
    require(['util', 'underscore'], function (util, _) {
        require(['/tpwechat/Public/js/app.js','css!/tpwechat/Public/css/app.css']);

        require(['angular', 'jquery'], function (angular,$) {
            angular.module('app', []).controller('ctrl', ['$scope', function ($scope) {
                if (angular.isFunction(controller)) {
                    controller($scope, $, _);
                }
            }]);
            //ng-app="app"
            angular.bootstrap(document.getElementsByTagName('body'), ['app']);
        });
    });
</script>
<!--<script src="/tpwechat/Public/js/bootstrap.js"></script>-->
<!--<script src="/tpwechat/Public/js/app.js"></script>-->
<!--<script src="/tpwechat/Public/js/slimscroll/jquery.slimscroll.min.js"></script>-->
<!--<script src="/tpwechat/Public/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>-->
<!--<script src="/tpwechat/Public/js/charts/sparkline/jquery.sparkline.min.js"></script>-->
<!--<script src="/tpwechat/Public/js/charts/flot/jquery.flot.min.js"></script>-->
<!--<script src="/tpwechat/Public/js/charts/flot/jquery.flot.tooltip.min.js"></script>-->
<!--<script src="/tpwechat/Public/js/charts/flot/jquery.flot.resize.js"></script>-->
<!--<script src="/tpwechat/Public/js/charts/flot/jquery.flot.grow.js"></script>-->
<!--<script src="/tpwechat/Public/js/charts/flot/demo.js"></script>-->

<!--<script src="/tpwechat/Public/js/calendar/bootstrap_calendar.js"></script>-->
<!--<script src="/tpwechat/Public/js/calendar/demo.js"></script>-->

<!--<script src="/tpwechat/Public/js/sortable/jquery.sortable.js"></script>-->

<!--<script src="/tpwechat/Public/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
<!--<script src="/tpwechat/Public/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!--<script src="/tpwechat/Public/js/jvectormap/demo.js"></script>-->
<!--<script src="/tpwechat/Public/js/app.plugin.js"></script>-->
</body>
</html>