<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo ($headconf['title']); ?></title>
    <link rel="icon" type="text/css" href="/Public/Home/icon.ico" />
    <?php if(is_array($headconf['css'])): foreach($headconf['css'] as $key=>$xo): ?><link rel="stylesheet" type="text/css" href="/Public/home/css/<?php echo ($xo); ?>.css" /><?php endforeach; endif; ?>
    <script src="/Public/Home/js/jquery-1.10.1.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="/Public/Home/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/Home/font-awesome-4.7.0/css/font-awesome.css">
    <?php if(is_array($headconf['js'])): foreach($headconf['js'] as $key=>$vo): ?><script src="/Public/home/js/<?php echo ($vo); ?>.js" type="text/javascript" charset="utf-8"></script><?php endforeach; endif; ?>
    <script src="/Public/Home/layer-v3.0.3/layer/layer.js"></script>
</head>

<body>
<!--头部开始-->
<div id="top">
    <!--头部灰条就开始-->
    <div class="topbox">
        <div class="main">
            <div class="topleft fl">
                <a href="javascript:;">欢迎来到冰雨商城</a>
                <a href="#">设为首页</a>
                <a href="#">收藏本站</a>
                <a href="#">帮助中心</a>
                <a href="#" class='last'><i></i>手机商城</a>
            </div>
            <div class="topright fr">
                <div class="login fl">
                    <?php if(!$_SESSION['_uid']): ?><a href="<?php echo u('Home/index/login');?>">登录</a>
                    <a href="<?php echo u('Home/signIn/signIn');?>">注册</a>
                    <?php else: ?>
                        <a href="javascript:;"><?php echo ($_SESSION['_username']); ?></a>
                        <a class="signOut" href="#">退出登录</a><?php endif; ?>
                </div>
                <span class="fl">|</span>
                <div class="fcode fl">

                    <a href="<?php echo u('Home/client/index');?>">我的订单</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.signOut').click(function () {
                var a=1;
                $.post("<?php echo u('Home/SignIn/signOut');?>",a,function (res) {

                    if(res.status){

                        layer.msg(res.info, {
                            icon: 16
                            ,shade: 0.01
                        });
                        setTimeout(function(){location.href=res.url}, 2000);
                    }
                },'json');
            })
        })

    </script>
    <!--头部灰条结束-->

    <!--logo区域开始-->
    <div class="logoRegion">
        <div class="main">
            <div class="logo">
                <a href=""><img src="/Public/Home/images/360logo.png"/></a>
            </div>
            <div class="seachRegion">
                <div class="seach fl">
                    <form action="<?php echo u('Home/Search/search');?>" method="get">
                        <input type="text" class="seachtxt fl"  name="search" value="" />
                        <input type="submit" class="btn" value="" />
                    </form>
                    <p class="searchkey">
                        <a href="">电竞配件低至5折</a>
                        <a href="">电竞配件低至5折</a>
                        <a href="">电竞配件低至5折</a>
                    </p>

                </div>

                <div class="topshopcart fr">
                    <!--判断是否来自与数据库-->
                    <?php if(count($fromData['goods'])): ?><a href=""  class="header-cart"><i></i>我的购物车(<span class="cart-size" style="color: #E4393C;"><?php if($fromData['total_rows']): echo ($fromData['total_rows']); else: ?>0<?php endif; ?></span>)</a>
                        <?php else: ?>
                        <a href=""  class="header-cart"><i></i>我的购物车(<span class="cart-size" style="color: #E4393C;"><?php if($cartData['total_rows']): echo ($cartData['total_rows']); else: ?>0<?php endif; ?></span>)</a><?php endif; ?>


                        <!--判断是否有数据-->
                        <?php if(count($fromData['goods'])): ?><!--做数据库的-->
                            <div class="cart-tips">
                                <div class="hh_top">最新加入的商品</div>
                                <!--seesion遍历-->
                                <?php if(is_array($fromData['goods'])): foreach($fromData['goods'] as $kk=>$yy): ?><!--要遍历的号-->
                                    <div class="hh_mid"  x="<?php echo ($yy['options']['caid']); ?>">
                                        <li class="goods_pic"><img src="/<?php echo ($yy['options']['pic']); ?>" alt="" style="width: 90% ;height: 90%; margin-top: 4%;margin-left: 4%;border: 1px solid #e3e3e3;"></li>
                                        <li class="goods_des"><a href=""><?php echo ($yy['name']); ?></a></li>
                                        <li class="goods_mon">
                                            <div class="goods_crash">￥<?php echo ($yy['price']); ?>×<span class="hh_goods_num"><?php echo ($yy['num']); ?></span></div>
                                            <div class="goods_remove"><a href="javascript:;">删除</a></div>
                                            <input type="hidden" value="<?php echo ($yy['options']['caid']); ?>">
                                        </li>
                                        <div class="hh_xiaoji" >
                                            <li class="hh_look">满赠</li>
                                            <li class="hh_notice"><span> 已购满99元，您可领赠品</span></li>
                                            <li class="hh_carsh">小计：￥<span class="hh_goodPrice"><?php echo ($yy['total']); ?></span></li>
                                        </div>
                                    </div><?php endforeach; endif; ?>
                                <!---->
                                <div class="hh_but">
                                    <li class="hh_zongshu">共<span class="hh_goodTotal"><?php echo ($fromData['total_rows']); ?></span>件商品</li>
                                    <li class="hh_zhongjia">共计￥<span class="hh_goodMoney"> <?php echo ($fromData['total']); ?></span></li>
                                    <li class="hh_shopcart"><a href="<?php echo u('Home/Cart/index');?>">去购物车</a></li>
                                </div>
                            </div>

                       <?php elseif((count($_SESSION['cart']['goods']))): ?>
                            <div class="cart-tips">
                                <div class="hh_top">最新加入的商品</div>
                                <!--seesion遍历-->
                                <?php if(is_array($cartData['goods'])): foreach($cartData['goods'] as $kk=>$yy): ?><div class="hh_mid" x="<?php echo ($kk); ?>">
                                        <li class="goods_pic"><img src="/<?php echo ($yy['options']['pic']); ?>" alt="" style="width: 90% ;height: 90%; margin-top: 4%;margin-left: 4%;border: 1px solid #e3e3e3;"></li>
                                        <li class="goods_des"><a href=""><?php echo ($yy['name']); ?></a></li>
                                        <li class="goods_mon">
                                            <div class="goods_crash">￥<?php echo ($yy['price']); ?>×<span class="hh_goods_num"><?php echo ($yy['num']); ?></span></div>
                                            <div class="goods_remove"><a href="javascript:;">删除</a></div>
                                            <input type="hidden" value="<?php echo ($kk); ?>">
                                        </li>
                                        <div class="hh_xiaoji" >
                                            <li class="hh_look">满赠</li>
                                            <li class="hh_notice"><span> 已购满99元，您可领赠品</span></li>
                                            <li class="hh_carsh">小计：￥<span class="hh_goodPrice"><?php echo ($yy['total']); ?></span></li>
                                        </div>
                                    </div><?php endforeach; endif; ?>


                                <div class="hh_but">
                                    <li class="hh_zongshu">共<span class="hh_goodTotal"><?php echo ($cartData['total_rows']); ?></span>件商品</li>
                                    <li class="hh_zhongjia">共计￥<span class="hh_goodMoney"> <?php echo ($cartData['total']); ?></span></li>
                                    <li class="hh_shopcart"><a href="<?php echo u('Home/Cart/index');?>">去购物车</a></li>
                                </div>
                            </div>
                            <?php else: ?>

                            <div class="cart-tips">
                                <div class="hh_text"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="color: #36aa3f;"></i><span style="margin-left: 10px;">购物车中还没有商品，赶紧选购吧！</span> </div>
                            </div><?php endif; ?>


                </div>
                <script>
                    $(function () {
                        $('.goods_remove').click(function () {
                            //将货品id获取到
                            var order = $(this).parent('.goods_mon').find('input').val();
                            //将货品数量获取到
                            var num = parseInt($(this).prev().find('.hh_goods_num').html());
                            //将货品价格获取到
                            var  xiaoji   = parseInt($(this).parents('.hh_mid').find('.hh_goodPrice').html());
                            //将总库存获取到
                            var total= parseInt($(this).parents('.cart-tips').find('.hh_goodTotal').html());
                             //将总价格获取到
                            var  totalPrice = parseInt($(this).parents('.cart-tips').find('.hh_goodMoney').html());
                            //将this保存住
                             _this=$(this);
                            //修改总数
                            _this.parents('.cart-tips').find('.hh_goodTotal').html(total-num);
                            //修改总价
                            _this.parents('.cart-tips').find('.hh_goodMoney').html(totalPrice-xiaoji);
                            $.post("<?php echo u('Home/Cart/cartDelAjax');?>",{order:order},function (res) {
                                         //普通删除数据
                                          del = res.id; //  获取删除的id
                                          if(res.valid==1){
                                              //遍历数据
                                              $(".shopcontent").each(function () {
                                                  //获取属性v的值
                                                  var  attr=  $(this).attr('v');
                                                  //删除底下列表
                                                  if(attr==del){
                                                      $(this).remove();
                                                  }
                                              //......
                                              })
                                          }
                                //小logo
                                var attr='';
                                var str ='';
                                if(res.valid==11){

                                    str +='<div class="hh_text"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="color: #36aa3f;"></i>';
                                    str +='<span style="margin-left: 10px;">购物车中还没有商品，赶紧选购吧！</span></div>';
                                    //删除购物车
                                    $('.cart-tips').html(str);

                                    //小logo
                                    attr +='<div class="cartEmptyx" style="text-align: center;margin-top: 50px;">';
                                    attr +='<div class="wrapper"><img src="/Resource/images/none.png" >';
                                    attr +='<span style="color: #363636;">您的购物车居然是空的</span>';
                                    attr += '<a href="<?php echo u("Home/index/index");?>" style="color: red;" class="goshopping">去逛逛</a></div></div>';
                                    //添加小logo
                                    $('.car').html(attr);
                                }

                            },'json');
                            //删除当前货品
                            _this.parents('.hh_mid').remove();
                            //修改购物车的总数量
                            $('.cart-size').html(total-num);
                            //修改底下的共计数量的值
                            $('.gongji ').find('span').html(total-num);
                            //修改底下合计总数
                            $('.heji').find('span').html(totalPrice-xiaoji);
                        })
                    })

                </script>

            </div>

        </div>
    </div>
    <!--logo区域结束-->
    <!--导航开始-->
    <div class="navbox">
        <div class="main">
            <h5 class="fl"><a href=""><i></i>全部智能酷品</a></h5>
            <ul class="menu fl">
                <?php $z=0;?>
                <?php if(is_array($toplist)): foreach($toplist as $key=>$vo): ?><li class="menulist">
                    <a href="<?php echo u('Home/listPage/listPage',['cid'=>$vo['cid']]);?>"><?php echo ($vo['cname']); ?></a>
                    <div class="menuHiden">

                        <ul class="product">
                            <?php if(is_array($vo['_data'])): foreach($vo['_data'] as $key=>$xo): $z++;?>
                                <?php  if($z<4){ ?>
                            <li>
                                <a href="<?php echo u('Home/listPage/listPage',['cid'=>$xo['cid']]);?>"><img src="/<?php echo ($xo['pic']); ?>" alt="" /><?php echo ($xo['gname']); ?></li>
                            <li>
                                <?php } endforeach; endif; ?>
                        </ul>



                    </div>
                </li><?php endforeach; endif; ?>

            </ul>

        </div>
        <!--隐藏轮播图-->
        <?php if(CONTROLLER_NAME =='Index'): ?><div class="main hiden">


            <div class="navHidden">

                <ul class="list2">

                    <?php if(is_array($listData)): foreach($listData as $key=>$vo): ?><li>
                        <a href="<?php echo u('Home/listPage/listPage',['cid'=>$vo['cid']]);?>"><i></i><?php echo ($vo['cname']); ?></a>
                        <div class="listhide">
                            <div class="contentOne">
                                <?php if(is_array($vo['_data'])): foreach($vo['_data'] as $key=>$xo): ?><dl>
                                    <a class="hh_lisname" href="<?php echo u('Home/listPage/listPage',['cid'=>$xo['cid']]);?>"><dt><?php echo ($xo['cname']); ?>>></dt></a>
                                    <?php if(is_array($xo['_data'])): foreach($xo['_data'] as $key=>$wo): ?><dd>
                                        <a  href="<?php echo u('Home/listPage/listPage',['cid'=>$wo['cid']]);?>" class="noo"><?php echo ($wo['cname']); ?></a>
                                    </dd><?php endforeach; endif; ?>
                                </dl><?php endforeach; endif; ?>
                            </div>
                        </div>
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>

            <div class="topad">

                <?php $a=0;?>
                <?php if(is_array($cellphone['_data'])): foreach($cellphone['_data'] as $key=>$vo): $b++;?>
                    <?php  if($b<3){ ?>
                <div class="righttopad">
                    <a href="<?php echo u('Home/listPage/listPage',['cid'=>$vo['cid']]);?>"><img width="100%" src="/<?php echo ($vo['pic']); ?>" /></a>
                </div>

                    <?php } endforeach; endif; ?>
            </div>
        </div><?php endif; ?>
    </div>
    <!--导航结束-->
    <div class="clear"></div>

<!--少一个div-->






</div>
<!--头部结束-->
<style>
    .listoption a:hover{
        color: #23AC38;
    }
</style>
<style>
    .list .postion dl dd a.red{
        color:red;
    }
</style>
<!--中间开始-->
<div id="content">
    <div class="list">
        <div class="main">
            <h4 class="listoption" ><a href="<?php echo u('Home/index/index');?>">首页</a><?php if(is_array($father)): foreach($father as $key=>$vo): ?>&gt;<a href="<?php echo u('Home/listPage/listPage',['cid'=>$vo['cid']]);?>"><?php echo ($vo['cname']); ?></a><?php endforeach; endif; ?></h4>
            <div class="postion">

                <?php if(is_array($finalTemp)): foreach($finalTemp as $k=>$vo): $temp = $param; $temp[$k]=0; ?>
                <dl>
                    <dt><?php echo ($vo['name']); ?>:</dt>

                    <dd>
                        <a <?php if($param[$k]==0): ?>style="color: red;"<?php endif; ?>  href="<?php echo u('Home/listPage/listPage',['cid'=>$_GET['cid'],'param'=>implode('-',$temp)]);?>" >不限</a>
                        <?php if(is_array($vo['value'])): foreach($vo['value'] as $key=>$xo): ?><!--//将每个数组里的存入param-->
                                <?php  $temp[$k]=$xo['gtid'] ?>
                        <a  <?php if($param[$k]==$xo['gtid']): ?>style="color: red;"<?php endif; ?>  href="<?php echo u('Home/listPage/listPage',['cid'=>$_GET['cid'],'param'=>implode('-',$temp)]);?>"><?php echo ($xo['gtvalue']); ?></a><?php endforeach; endif; ?>
                    </dd>

                </dl><?php endforeach; endif; ?>




                    <dl>
                        <dt>排序:</dt>
                        <dd>
                            <a href="">默认</a>
                            <a href="">价格</a>
                        </dd>

                    </dl>
            </div>

        </div>
    </div>

    <div class="listcontent">
        <div class="main">
            <ul>


                <?php if(is_array($listPageData)): foreach($listPageData as $key=>$vo): ?><li>
                    <div class="listdesc">
                        <dl class="desc">
                            <a href="<?php echo u('Home/content/contents',['gid'=>$vo['gid']]);?>" class="pro_list">
                                <dt class="pic"><img class="lazy" src="/<?php echo ($vo['pic']); ?>"  alt="360手机f4标准版移动4G魔力白"></dt>
                                <dd class="cont">
                                    <span class="title"><?php echo ($vo['gname']); ?></span>
                                    <span class="price"><?php echo ($vo['shopprice']); ?>元</span>
                                </dd>
                            </a>
                            <dd class="btns" >

                                <a href="<?php echo u('Home/content/contents',['gid'=>$vo['gid']]);?>" class="add-cart" ><i></i><em>加入购物车</em></a>
                            </dd>
                        </dl>
                    </div>

                </li><?php endforeach; endif; ?>



            </ul>
        </div>

    </div>
</div>
<!--尾部开始-->
<div class="mod-footer">
    <div class="foot-bannerw">
        <div class="foot-banner clearfix">
            <div class="banner-item">
                <a href="#" target="_blank" data-monitor="home_foot_days7"><i class="icon1">7</i>7天无理由退货</a>
            </div>
            <div class="banner-item">
                <a href="#" target="_blank" data-monitor="home_foot_days15"><i class="icon2">15</i>15天免费换货</a>
            </div>
            <div class="banner-item"><i class="icon3">包</i>满99元包邮</div>
            <div class="banner-item">
                <a href="#" target="_blank" data-monitor="home_foot_moblie"><i class="icon4">服</i>手机特色服务</a>
            </div>
        </div>
    </div>
    <div class="foot-containerw">
        <div class="foot-container clearfix">
            <dl class="foot-con"> <dt data-monitor="home_foot_freshman">帮助中心 </dt>
                <dd data-monitor="home_help_freshman">
                    <a target="_blank" href="#" rel="nofollow">用户注册</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">用户登录与密码找回</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">购买指南</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">支付方式</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">配送与说明</a>
                </dd>
            </dl>
            <dl class="foot-con"> <dt data-monitor="home_foot_help">售后服务 </dt>
                <dd data-monitor="home_help_help">
                    <a target="_blank" href="#">7 日无理由退货</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">质量问题 15 日内换货</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">保修条款</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">服务流程</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">安迷之家</a>
                </dd>
            </dl>
            <dl class="foot-con"> <dt data-monitor="home_foot_guide">特色服务 </dt>
                <dd data-monitor="home_help_guide">
                    <a target="_blank" href="#" rel="nofollow">F码通道</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">免费试用</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">360 生态</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">一元夺宝</a>
                </dd>
            </dl>
            <dl class="foot-con"> <dt data-monitor="home_foot_tuiguang">推广合作 </dt>
                <dd data-monitor="home_help_try">
                    <a target="_blank" href="#" rel="nofollow">商品入驻</a>
                </dd>
                <dd>
                    <a target="_blank" href="#" rel="nofollow">大客户采购</a>
                </dd>
            </dl>
            <dl class="foot-con"> <dt data-monitor="home_foot_try">关注360商城 </dt>
                <dd data-monitor="home_help_try">
                    <a target="_blank" href="#" rel="nofollow">360商城大事记</a>
                </dd>
            </dl>

        </div>
    </div>
    <div class="footer-copyright">冰雨商城 ©2016-2018 BYCMS工作室版权所有 京ICP备000001号-43</div>
</div>
<!--尾部结束-->

<!--右边底部返回顶部-->
<div class="slidebar" id="slidebar">
    <ul>
        <li class="topback">
            <a href="javascript:;"></a>
        </li>
    </ul>
</div>
<!--右边底部返回顶部结束-->

</body>

</html>