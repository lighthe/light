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
                    

<div class="col-lg-12 ">
    <ul class="nav nav-tabs" style="margin-top: 10px;">
        <li role="presentation " ><a href="<?php echo u('admin/goods/index');?>">商品列表</a></li>
        <li role="presentation " class="active"><a href="<?php echo u('admin/goods/add');?>">编辑商品</a></li>
    </ul>
    <section class="panel panel-default">
        <header class="panel-heading font-bold">商品添加</header>
        <div class="panel-body">

            <form class="form-horizontal" method="post" action="" onsubmit=" return store(this)" >
                <div class="form-group">
                    <label class="col-sm-2 control-label">所属分类</label>
                    <div class="col-sm-6">
                        <select name="cid" class="form-control m-b">
                            <option value="0" tid="-1">请选择</option>
                            <?php if(is_array($cateData)): $i = 0; $__LIST__ = $cateData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--这里我们要将被选择的元素的值拿到-->
                                <option value="<?php echo ($vo['cid']); ?>" tid="<?php echo ($vo['tid']); ?>"  <?php if($oldData['cid']==$vo['cid']): ?>selected<?php endif; ?>><?php echo ($vo['_cname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--用ajax抓取option的值-->
                        </select>
                    </div>
                </div>
                <!--ajax    -->
                <script>

                    $(function () {

                            var attr = $('#attr').html();
                             var spec = $('#spec').html();
                            var oldCid =<?php echo $oldData['cid']?>;


                        $('select[name=cid]').change(function () {
                            //1.抓取attr里tid的值
                            var tid= $(':selected').attr('tid');
                            //2.将tid的值写到隐藏域里 这里用来
                            $('input[name=tid]').val(tid);
                            //3.判断是否是顶级分类
                            if(tid==0){
                                alert('顶级分类不能添加商品');
                                //为什么这里为0时变会请选择
                                $(this).val(0);
                            }
                            //旧数据
                           var cid = $(this).val();
                            if(cid==oldCid){
                                $('#attr').html(attr);
                                $('#spec').html(spec);
                                return false;
                            }
                            //1.要发送的地址,数据,回调函数
                            $.post("<?php echo u('ajaxGetSpec');?>",{tid:tid},function (res) {
                                var attr='';
                                var spec='';

                                $.each(res,function (k,v) {
                                    //v里的class为0 是说明是属性
                                    if(v.class=='0'){
                                        attr += '<tr><td>'+v.taname+'</td>';
                                        attr +='<td><select name="attr['+v.taid+']" id="">';
                                        attr +='<option value="-1">请选择</option>';
                                        //遍历tavalue里的数据
                                        $.each(v.tavalue,function (kk,vv) {
                                            attr +='<option value="'+vv+'">'+vv+'</option>';
                                        })
                                        attr +='</select></td></tr>';
                                    }else {
                                        //v里是class为1时 说明是规格
                                        spec +='<tr><td>'+v.taname+'</td>';
                                        spec +='<td><select name="spec['+v.taid+'][spec][]" id="">';
                                        spec +='<option value="-1">请选择</option>';
                                        //遍历tavalue里的数据
                                        $.each(v.tavalue,function (kk,vv) {
                                            spec +='<option value="'+vv+'">'+vv+'</option>';
                                        })
                                        //附加价格
                                        spec +='</select></td><td>附加价格</td>';
                                        spec +='<td><input type="text" name="spec['+v.taid+'][added][]" value=""></td>';
                                        spec +='<td><button type="button" class="btn btn-success btn-xs addSpec">添加</button>';
                                        spec +='</td></tr>';
                                    }
                                })
                                $('#attr').html(attr);
                                $('#spec').html(spec);
                            },'json');
                        })
                    })
                </script>


                <script>

                    $(function () {
                        $('#spec').delegate('.addSpec','click',function () {
                            //先复制一分
                            var tr = $(this).parents('tr').clone();
                            //将添加按妞换成删除按钮
                            var del= '<button type="button" class="btn btn-danger btn-xs delSpec">删除</button>';
                            tr.find('td').last().html(del);
                            //把复制的一份在tr之后追加
                            $(this).parents('tr').after(tr);
                        })
                        //点击删除
                        $('#spec').delegate('.delSpec','click',function () {
                            $(this).parents('tr').remove();
                        })
                    })
                </script>


                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">所属品牌</label>
                    <div class="col-sm-6">
                        <select name="lid" class="form-control m-b">
                            <option value="0">请选择</option>
                            <?php if(is_array($brandData)): $i = 0; $__LIST__ = $brandData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$qq): $mod = ($i % 2 );++$i;?><option value="<?php echo ($qq['lid']); ?>"<?php if($oldData['lid']==$qq['lid']): ?>selected<?php endif; ?>><?php echo ($qq['lname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">商品名称</label>
                    <div class="col-sm-6">
                        <input type="text" name="gname" class="form-control" value="<?php echo ($oldData['gname']); ?>">
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">商品货号</label>
                    <div class="col-sm-6">
                        <input type="text" name="gnumber" class="form-control" value="<?php echo ($oldData['gnumber']); ?>">
                        <span class="help-block m-b-none">请输入商品货号。。。</span>
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">单位</label>
                    <div class="col-sm-6">
                        <input type="text" name="unit" class="form-control" id="input-id-1" value="<?php echo ($oldData['unit']); ?>">
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">市场价</label>
                    <div class="col-sm-6">
                        <input type="number" name="marketprice" class="form-control" value="<?php echo ($oldData['marketprice']); ?>">
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">商城价</label>
                    <div class="col-sm-6">
                        <input type="number"  class="form-control" name="shopprice" placeholder="" value="<?php echo ($oldData['shopprice']); ?>">
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">点击数</label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" name="click" placeholder="" value="<?php echo ($oldData['click']); ?>">
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">库存</label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" name="total" placeholder="" value="<?php echo ($oldData['total']); ?>">
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">商品属性</label>
                    <div class="col-sm-6">
                        <table class="table table-hover" id="attr">
                            <!--我要在这里追加商品属性元素-->
                            <?php if(is_array($attrData)): foreach($attrData as $b=>$a): ?><tr>
                            <td><?php echo ($a['taname']); ?></td>
                            <td>
                            <select   name="attr[<?php echo ($a['taid']); ?>]" id="">
                            <option value="0">请选择</option>

                                <?php if(is_array($a['tavalue'])): foreach($a['tavalue'] as $d=>$c): ?><option value="<?php echo ($c); ?>" <?php if(in_array($c,$hasAttr)): ?>selected<?php endif; ?>><?php echo ($c); ?></option><?php endforeach; endif; ?>
                            </select>
                            </td>
                            </tr><?php endforeach; endif; ?>
                        </table>
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">商品规格</label>
                    <div class="col-sm-6">
                        <table class="table table-hover" id="spec">

                                <?php if(is_array($specData)): foreach($specData as $key=>$vo): ?><tr>
                                        <td><?php echo ($vo['taname']); ?></td>
                                        <td>
                                            <select name="spec[<?php echo ($vo['taid']); ?>][spec][]" id="">
                                                <option value="0">请选择</option>
                                                <?php if(is_array($vo['tavalue'])): foreach($vo['tavalue'] as $key=>$v): ?><option <?php if($vo['gtvalue']==$v): ?>selected<?php endif; ?>  value="<?php echo ($v); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </td>
                                        <td>
                                            附加价格
                                        </td>
                                        <td>
                                            <input type="text" name="spec[<?php echo ($vo['taid']); ?>][added][]" value="<?php echo ($vo['added']); ?>">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-xs delSpec">删除</button>
                                        </td>
                                    </tr>
                                    <script>
                                        $(function(){
                                            $('#spec').find("tr:contains(<?php echo ($vo['taname']); ?>)").eq(0).find("td:last").html('<button type="button" class="btn btn-success btn-xs addSpec">添加</button>');
                                        })
                                    </script><?php endforeach; endif; ?>


                        </table>


                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">列表图</label>

                    <div class="col-sm-5" id="listPic">

                        <div class="input-group">
                            <input type="text" class="form-control" name="pic" readonly="" value="<?php echo ($oldData['pic']); ?>">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="/<?php echo ($oldData['pic']); ?>"  class="img-responsive img-thumbnail" width="150">
                            <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="removeImg(this)">×</em>
                        </div>
                        <script>
                            //上传图片
                            function upImage(obj) {
                                require(['util'], function (util) {
                                    options = {
                                        multiple: false,//是否允许多图上传
                                        //data是向后台服务器提交的POST数据
                                        data:{name:'后盾人',year:2099},
                                    };
                                    util.image(function (images) {
                                        //上传成功的图片，数组类型 
                                        $("[name='pic']").val(images[0]);
                                        $(".img-thumbnail").attr('src','/'+ images[0]);
                                    }, options)
                                });
                            }
                            //移除图片
                            function removeImg(obj) {
                                $(obj).prev('img').attr('src', '/images/nopic.jpg');
                                $(obj).parent().prev().find('input').val('');
                            }


                        </script>
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">商品图册</label>
                    <div class="col-sm-2">
                        <button onclick="upImage1(this)" class="btn btn-default" type="button">选择图片</button>
                        <script>
                            //上传图片
                            function upImage1(obj) {
                                require(['util'], function (util) {
                                    options = {
                                        //上传多图
                                        multiple: true,
                                    };
                                    util.image(function (images) {
                                        $(images).each(function(k,v){
                                            $("<li><img style='width:80px' src='/"+v+"'/><input type='hidden' name='img[]' value='"+v+"'/> <a href='javascript:;' class='delImg'>X</a></li>").appendTo('#box');
                                        })
                                    }, options)
                                });
                            }
                        </script>
                    </div>
                    <style>
                        #box li{
                            float: right;
                            list-style:none;
                        }

                    </style>
                    <div class="col-sm-8" id="box" >
                        <?php if(is_array($oldData['big'])): foreach($oldData['big'] as $d=>$c): ?><li><img style='width:80px' src='/<?php echo ($c); ?>'/>
                            <input type='hidden' name='img[]' value='<?php echo ($c); ?>'/>
                            <a href='javascript:;' class='delImg'>X</a>
                        </li><?php endforeach; endif; ?>
                    </div>

                    <script>
                        $('#box').delegate('.delImg','click',function () {
                            $(this).parent().remove();
                        })
                    </script>

                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">商品详情</label>
                    <div class="col-sm-7">
                        <textarea id="container1"  name="intro" style="height:300px;width:100%;"  ><?php echo ($oldData['intro']); ?></textarea>
                        <script>
                            util.ueditor('container1', {hash:2,data:'hd'}, function (editor) {
                                //这是回调函数 editor是百度编辑器实例
                            });
                        </script>
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">售后服务</label>
                    <div class="col-sm-7">
                        <textarea id="container2" style="height:300px;width:100%;" name="service"><?php echo ($oldData['service']); ?></textarea>
                        <script>
                            util.ueditor('container2', {hash:2,data:'hd'}, function (editor) {
                                //这是回调函数 editor是百度编辑器实例
                            });
                        </script>
                    </div>
                </div>
                <input type="hidden" name="tid" value="<?php echo ($oldData['tid']); ?>">
                <input type="hidden" name="gid" value="<?php echo I('get.gid');?>">
                <div class="col-sm-4  col-md-offset-3">
                    <button type="submit" class="btn btn-twitter btn-block m-b-sm " >提交</button>
                </div>

            </form>
        </div>
    </section>
</div>
<script>

    function controller($scope, $, _){

    }

    //ajax返回信息
    function store(obj) {
         var data=$(obj).serialize();
            $.post("<?php echo u('add');?>",data,function (res) {
                if(res.status){

                    util.message(res.info,"<?php echo u('index');?>",'success');
                }else {

                    util.message(res.info,"back",'error');
                }

            },'json')
            return false;
    }
</script>
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