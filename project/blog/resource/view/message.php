<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--	<meta charset="UTF-8">-->
<!--	<title>温馨提示</title>-->
<!--	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--	<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->
<!--	<link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
<!--</head>-->
<!--<body style="background: url('{{__ROOT__}}/resource/images/bg.jpg');background-size: cover">-->
<!--<!--导航-->-->
<!--<nav class="navbar navbar-inverse" style="border-radius: 0px;">-->
<!--	<div class="container-fluid">-->
<!--		<div class="navbar-header">-->
<!--			<ul class="nav navbar-nav">-->
<!--				<li>-->
<!--					<a href="http://bbs.houdunwang.com" target="_blank"><i class="fa fa-w fa-forumbee"></i> 后盾论坛</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="http://www.houdunwang.com" target="_blank"><i class="fa fa-w fa-phone-square"></i> 联系后盾</a>-->
<!--				</li>-->
<!--			</ul>-->
<!--		</div>-->
<!--	</div>-->
<!--</nav>-->
<!--<!--导航end-->-->
<!--<div class="container-fluid">-->
<!--	<div style="background: url('{{__ROOT__}}/resource/images/logo.png') no-repeat;background-size: contain;height:80px;margin-top: 60px;"></div>-->
<!--	<div class="alert alert-info clearfix jumbotron" style="padding:30px;margin-top: 50px;">-->
<!--		<br/>-->
<!--		<div class="col-xs-3">-->
<!--			<i class="fa fa-5x fa-w {{$ico}}"></i>-->
<!--		</div>-->
<!--		<div class="col-xs-9">-->
<!--			<p>{{$content}}</p>-->
<!--			<if value="$redirect=='back'">-->
<!--				<p>-->
<!--					<a href="javascript:void(0);" onclick="{{$url}}" class="alert-link">如果你的浏览器没有跳转, 请点击此链接</a>-->
<!--				</p>-->
<!--				<else/>-->
<!--				<p><a href="javascript:void(0);" onclick="{{$url}}" class="alert-link">如果你的浏览器没有跳转, 请点击此链接</a></p>-->
<!--			</if>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<script>-->
<!--	setTimeout(function () {--><?php //echo $url;?><!--//},--><?php //echo $timeout;?><!--//);-->
<!--//</script>-->
<!--//</body>-->
<!--//</html>-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="eng">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>温馨提示</title>
    <link rel="stylesheet" media="screen" href="./resource/message/_css/style.css" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="./resource/message/favicon.png" />
    <link rel="icon" type="image/x-icon" href="./resource/message/favicon.png" />
    <link rel="apple-touch-icon" href="./resource/message/favicon.png" />
    <link rel="apple-touch-startup-image" href="./resource/message/favicon.png" />
</head>
<body>
<div class="controller">
    <div class="objects">
        <!-- text area -->
        <div class="text-area rotate">
            <p class="error">Error 404</p>
            <p style="font-size: 30px;" class="details">There was a problem<br /><br />{{$content}} !</p>
        </div>
        <!-- home page -->
        <div class="homepage rotate">
            <p style="font-size: 26px;"><a  href="javascript:void(0);" onclick="{{$url}}" class="alert-link">如果你的浏览器没有<br/>跳转, 请点击此链接!</a></p>
        </div> <!-- home page -->
    </div> <!-- social-icons -->

</div>

</body>
<script>
    setTimeout(function () {<?php echo $url;?>},<?php echo $timeout;?>);
</script>
</html>