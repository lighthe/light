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
<!--中间开始-->
<div id="content">

    <div class="cont">
        <div class="main">
            <div class="content-left">
                <div class="box">
                    <div class="zhezhao"></div>
                    <div class="sekuai"></div>
                    <div class="smallTu"></div>
                    <a href="javascript:;" class="shang">&lt;</a>
                    <div class="list1">

                        <ul>
                            <?php if(is_array($content['big'])): foreach($content['big'] as $key=>$vo): ?><li><img src="/<?php echo ($vo); ?>" alt=""></li><?php endforeach; endif; ?>
                        </ul>

                    </div>
                    <a href="javascript:;" class="xia">&gt;</a>

                    <div class="bgTu"></div>
                    <div class="bgTuHide">
                        <ul>
                            <?php if(is_array($content['big'])): foreach($content['big'] as $key=>$vo): ?><li><img width="800px" height="800px" src="/<?php echo ($vo); ?>" alt=""></li><?php endforeach; endif; ?>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="content-right">

                <div class="tit"><?php echo ($content['gname']); ?></div>
                <div class="description"><?php echo ($content['gtitle']); ?></div>
                <div class="pirve">￥ <?php echo ($content['shopprice']); ?></div>
                <!-- <li class="zhong">国行</li>-->
                <?php if(is_array($check)): foreach($check as $k=>$vo): ?><div class="category">

                    <h4><?php echo ($k); ?></h4>
                    <ul>
                        <?php if(is_array($vo)): foreach($vo as $kk=>$xx): ?><li gtid="<?php echo ($xx['gtid']); ?>" ><?php echo ($xx['gtvalue']); ?></li><?php endforeach; endif; ?>
                    </ul>
                </div><?php endforeach; endif; ?>




                <style>
                    .cont .content-right .nobdr h6.red{

                        background: #fa5437;

                    }
                    .cont .content-right .nobdr h6.huise{
                        background: #333;
                    }
                </style>
                <script>
                    $(function () {

                        var len=<?php echo count($check) ?>;
                        var gid=<?php  echo $_GET['gid'] ?>;
                         sd='';
                        $('.category ul li').click(function () {
                            sd='';
                            //1.得到zhong的长度
                            //2,当点击class为中的长度=数组的个数时
                            if($('.zhong').length==len){
                                //3.有class 为.zhong的attr值获取到
                                $.each($('.zhong'),function () {
                                    //将得到组合数据
                                    sd +=$(this).attr('gtid')+',';
                                })


                               // 4.发送ajax
                                $.post("<?php echo u('ajaxGetTotal');?>",{gid:gid,combine:sd},function (res) {
                                        //ajax数据
                                        $('#hh_inventory').html(res.total);
                                    //颜色判断
                                    if(res.valid){
                                        //如果是true的话会添加red背景色
                                        $('.cont .content-right .nobdr h6').addClass('red').removeClass('huise');
                                    }else {
                                        //如果是flase的话会去除red背景色
                                        $('.cont .content-right .nobdr h6').addClass('huise').removeClass('red');
                                    }
                                },'json');


                            }
                        })
                    })

                </script>
                <div class="num">
                    <h5>数量</h5>
                    <a href="javascript:;" class="num_l">-</a>
                    <input type="text" value="1" />
                    <a href="javascript:;" class="num_r">+</a>
                    <!--点击数量判断-->
                    <script>
                        $(function(){
                            //判断如果 num 里的value 大用 input text里的最大值 将input里的值重新赋值给 input
                            $('.num_r').click(function () {

                                var max =parseInt($('#hh_inventory').html());
                                        //注意字符串转整
                                var number=parseInt($('.num').find('input').val());
                               if(number >= max){

                                   layer.msg('没有存货啦！！', function(){
                                       //关闭后的操作
                                   });
                                    $('.num').find('input').val(max);
                               }
                            })

                        })
                    </script>
                    <!--ajax库存-->
                    <div style="margin-top:5px; ">
                        <span style="color: red;margin-left: 25px;">库存共:</span><span style="margin-left: 10px;"  id="hh_inventory">0</span>
                    </div>
                </div>
                <div class="nobdr">
                    <h6 class="red" ><a href="javascript:;">立即购买</a></h6>
                </div>

                <script>

                    $(function () {
                        //注意这里的h6后面不能加空格
                            var len =<?php echo count($check)?>;

                        //注意这个的颜色属性
                        $('.cont .content-right .nobdr h6.red').click(function () {
                            //这里红色本来就有所有无法判断

                            //所以要判断class里有没有灰色
                            if($(this).is('.huise')){

                                layer.msg('库存为0', function(){
        //关闭后的操作
                                });
                                return false;
                            }
                            //如果class 中的长度和len的不相同
                            //如果没有选择规格
                            if($('.zhong').length !=len){
                                layer.msg('请选择商品规格', function(){
                                    //关闭后的操作

                                });

                                return false;
                            }
                            //如何数量最大值判断？

                            //货品id
                            var gid=<?php  echo $_GET['gid'] ?>;
                            //商品数量
                            var num= parseInt($('.num').find('input').val());
                             //库存总数
                            var inventory =  parseInt($('#hh_inventory').html());

                            if( num > inventory){

                                layer.msg('没有库存啦', function(){
            //关闭后的操作
                                });
                                $('.num').find('input').val(inventory);

                                return false;
                                }

                            var option ={};
                            //遍历选中的值
                            $.each($('.zhong'),function () {
                                //将选中的值存以他的规格值
                                option[$(this).parents('.category').find('h4').html()]=$(this).html();
                            })

                            $.post("<?php echo u('ajaxAddCart');?>",{gid:gid,num:num,option:option,inventory:inventory,sd:sd},function (res) {

                                if(res){
                                    location.href="<?php echo u('Home/Cart/index');?>";
                                }
                            })

                        })
                    })

                </script>
                <div class="houdun">
                    <h3>保障</h3>
                    <p><i class="o1"></i>360商城发货&售后</p>
                    <p><i class="o2"></i>满99元包邮</p>
                    <p><i class="o3"></i>7天无理由退货</p>
                    <p><i class="o4"></i>15天免费换货</p>
                </div>
            </div>
        </div>
    </div>
    <div class="desc" id="xijie">
        <div class="desctab" >
            <div class="main">
                <ul>
                    <li><a href="#xijie">产品详情</a><span>|</span></li>
                    <li><a href="#guige">规格参数</a><span>|</span></li>
                    <li><a href="#wenti">常见问题</a></li>
                </ul>
            </div>
        </div>

        <div class="con" >

            <img src="/Public/Home/images/t0159dae288111b9b39.jpg" />
            <img src="/Public/Home/images/t0159dae288111b9b39.jpg" />
            <img src="/Public/Home/images/t0159dae288111b9b39.jpg" />
            <img src="/Public/Home/images/t0159dae288111b9b39.jpg" />
            <img src="/Public/Home/images/t0159dae288111b9b39.jpg" />
        </div>
        <div class="con main" id="guige">
            <h1>产品参数</h1>
            <table cellpadding="0" cellspacing="0" border="1">
                <tbody>
                <tr>
                    <td class="wd207" colspan="2">主体</td>
                </tr>
                <tr>
                    <td class="wd207">品牌</td>
                    <td>360手机</td>
                </tr>
                <tr>
                    <td class="wd207">型号</td>
                    <td>1509-A00（Q5 Plus)</td>
                </tr>
                <tr>
                    <td class="wd207">上市时间</td>
                    <td>2016年8月</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">基本信息</td>
                </tr>
                <tr>
                    <td class="wd207">机身颜色</td>
                    <td>流光金</td>
                </tr>
                <tr>
                    <td class="wd207">机身尺寸（mm）</td>
                    <td>156.5*80*8.3</td>
                </tr>
                <tr>
                    <td class="wd207">机身重量（g）</td>
                    <td>175.0g</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">操作系统</td>
                </tr>
                <tr>
                    <td class="wd207">操作系统</td>
                    <td>360 OS Android 6.0</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">主芯片</td>
                </tr>
                <tr>
                    <td class="wd207">CPU型号</td>
                    <td>骁龙820</td>
                </tr>
                <tr>
                    <td class="wd207">CPU频率</td>
                    <td>Kryo 2.15GHz x 4</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">网络支持</td>
                </tr>
                <tr>
                    <td class="wd207">双卡机类型</td>
                    <td>双卡双待单通</td>
                </tr>
                <tr>
                    <td class="wd207">SIM卡类型</td>
                    <td>Nano SIM</td>
                </tr>
                <tr>
                    <td class="wd207">网络制式</td>
                    <td>全网通</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">存储</td>
                </tr>
                <tr>
                    <td class="wd207">ROM</td>
                    <td>128GB UFS2.0 机身存储</td>
                </tr>
                <tr>
                    <td class="wd207">RAM</td>
                    <td>4GB LPDDR4 双通道内存</td>
                </tr>
                <tr>
                    <td class="wd207">存储卡</td>
                    <td>支持MicroSD（TF）</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">屏幕</td>
                </tr>
                <tr>
                    <td class="wd207">主屏幕尺寸（英寸）</td>
                    <td>6.0英寸</td>
                </tr>
                <tr>
                    <td class="wd207">分辨率</td>
                    <td>1920*1080(FHD)</td>
                </tr>
                <tr>
                    <td class="wd207">屏幕材质类型</td>
                    <td>三星（SAMSUNG）Super AMOLED</td>
                </tr>
                <tr>
                    <td class="wd207">屏幕色彩</td>
                    <td>1600万</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">前置摄像头</td>
                </tr>
                <tr>
                    <td class="wd207">前置摄像头</td>
                    <td>1300万像素</td>
                </tr>
                <tr>
                    <td class="wd207">前摄光圈大小</td>
                    <td>f/2.0</td>
                </tr>
                <tr>
                    <td class="wd207">美颜技术</td>
                    <td>支持</td>
                </tr>
                <tr>
                    <td class="wd207">拍照特点</td>
                    <td>美颜</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">后置摄像头</td>
                </tr>
                <tr>
                    <td class="wd207">后置摄像头</td>
                    <td>双1300万像素</td>
                </tr>
                <tr>
                    <td class="wd207">摄像头光圈大小</td>
                    <td>f/2.0</td>
                </tr>
                <tr>
                    <td class="wd207">闪光灯</td>
                    <td>LED灯</td>
                </tr>
                <tr>
                    <td class="wd207">美颜技术</td>
                    <td>支持</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">电池信息</td>
                </tr>
                <tr>
                    <td class="wd207">电池容量（mAh）</td>
                    <td>3700</td>
                </tr>
                <tr>
                    <td class="wd207">电池是否可拆卸</td>
                    <td>否</td>
                </tr>
                <tr>
                    <td class="wd207">闪充</td>
                    <td>支持QC3.0涡轮闪充</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">娱乐功能</td>
                </tr>
                <tr>
                    <td class="wd207">mic数量</td>
                    <td>2个</td>
                </tr>
                <tr>
                    <td class="wd207">喇叭数量</td>
                    <td>1个</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">数据接口</td>
                </tr>
                <tr>
                    <td class="wd207">数据传输接口</td>
                    <td>WIFI、蓝牙、WiFi热点、OTG接口</td>
                </tr>
                <tr>
                    <td class="wd207">NFC/NFC模式</td>
                    <td>不支持</td>
                </tr>
                <tr>
                    <td class="wd207">耳机接口类型</td>
                    <td>3.5mm</td>
                </tr>
                <tr>
                    <td class="wd207">充电接口类型</td>
                    <td>Type-C</td>
                </tr>
                <tr>
                    <td class="wd207" colspan="2">手机特性</td>
                </tr>
                <tr>
                    <td class="wd207">指纹识别</td>
                    <td>支持</td>
                </tr>
                <tr>
                    <td class="wd207">GPS</td>
                    <td>支持</td>
                </tr>
                <tr>
                    <td class="wd207">电子罗盘</td>
                    <td>支持</td>
                </tr>
                <tr>
                    <td class="wd207">霍尔感应器</td>
                    <td>支持</td>
                </tr>
                <tr>
                    <td class="wd207">陀螺仪</td>
                    <td>支持</td>
                </tr>
                <tr>
                    <td class="wd207">其他</td>
                    <td>距离感应、呼吸灯、光线感应</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="con main" id="wenti">
            <h2>常见问题</h2>
            <dl>
                <dt><i>1、</i><em></em>订单提交成功后还可以修改收货信息吗？</dt>
                <dd><u></u>订单付款之前，您可以进入“我的订单”，在订单详情页内修改收货信息。付款之后将不可修改收货信息。</dd>
            </dl>
            <dl>
                <dt><i>2、</i><em></em>订单提交成功后还可以修改收货信息吗？</dt>
                <dd><u></u>订单付款之前，您可以进入“我的订单”，在订单详情页内修改收货信息。付款之后将不可修改收货信息。</dd>
            </dl>
            <dl>
                <dt><i>3、</i><em></em>订单提交成功后还可以修改收货信息吗？</dt>
                <dd><u></u>订单付款之前，您可以进入“我的订单”，在订单详情页内修改收货信息。付款之后将不可修改收货信息。</dd>
            </dl>
            <dl>
                <dt><i>4、</i><em></em>订单提交成功后还可以修改收货信息吗？</dt>
                <dd><u></u>订单付款之前，您可以进入“我的订单”，在订单详情页内修改收货信息。付款之后将不可修改收货信息。</dd>
            </dl>
            <dl>
                <dt><i>5、</i><em></em>订单提交成功后还可以修改收货信息吗？</dt>
                <dd><u></u>订单付款之前，您可以进入“我的订单”，在订单详情页内修改收货信息。付款之后将不可修改收货信息。</dd>
            </dl>
            <dl>
                <dt><i>6、</i><em></em>订单提交成功后还可以修改收货信息吗？</dt>
                <dd><u></u>订单付款之前，您可以进入“我的订单”，在订单详情页内修改收货信息。付款之后将不可修改收货信息。</dd>
            </dl>
            <dl>
                <dt><i>7、</i><em></em>订单提交成功后还可以修改收货信息吗？</dt>
                <dd><u></u>订单付款之前，您可以进入“我的订单”，在订单详情页内修改收货信息。付款之后将不可修改收货信息。</dd>
            </dl>

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