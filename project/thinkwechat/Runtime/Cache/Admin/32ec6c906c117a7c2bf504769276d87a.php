<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
    <meta charset="utf-8" />
    <title>Notebook | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="/thinkwechat/Public/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/thinkwechat/Public/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/thinkwechat/Public/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/thinkwechat/Public/css/font.css" type="text/css" />
    <link rel="stylesheet" href="/thinkwechat/Public/css/app.css" type="text/css" />
    <!--[if lt IE 9]>
    <!--<script src="js/ie/html5shiv.js"></script>-->
    <!--<script src="js/ie/respond.min.js"></script>-->
    <!--<script src="js/ie/excanvas.js"></script>-->
    <![endif]-->
</head>
<body class="">
<section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xxl">
        <a class="navbar-brand block" href="index.html">HDCMS</a>
        <section class="panel panel-default m-t-lg bg-white">
            <header class="panel-heading text-center">
                <h4>登录</h4>
            </header>
            <form action="" method="post" class="panel-body wrapper-lg">
                <div class="form-group">
                    <label class="control-label">帐号</label>
                    <input type="text" placeholder="请输入登录帐号"  name="user" class="form-control input-lg">
                </div>
                <div class="form-group">
                    <label class="control-label">密码</label>
                    <input type="password" id="inputPassword"  name="password" placeholder="请输入登录密码" class="form-control input-lg">
                </div>
                <div class="form-group">
                    <label class="control-label">验证码</label>
                    <input type="text" id="inputPassword"  name="code" placeholder="请输入验证码" class="form-control input-lg">
                </div>
                <img src="<?php echo u('admin/login/code');?>" alt="" onclick="this.src=this.src+'?'+Math.random()">
                <button type="submit" class="btn btn-primary btn-block">登录</button>
                <div class="line line-dashed"></div>
                <p class="text-muted text-center"><small>何辉的微信的登入</small></p>
                <a href="signin.html" class="btn btn-default btn-block">首页</a>
            </form>
        </section>
    </div>
</section>
<!-- footer -->
<footer id="footer">
    <div class="text-center padder clearfix">
        <p>
            <small>专注为中小企业和个人站长服务<br>&copy; 2017</small>
        </p>
    </div>
</footer>
<!-- / footer -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.js"></script>
<!-- App -->
<script src="js/app.js"></script>
<script src="js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>