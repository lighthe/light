<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>{{$header['title']}}</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="./resource/home/css/zerogrid.css">
    <link rel="stylesheet" href="./resource/home/css/style.css">
    <link rel="stylesheet" href="./resource/home/css/responsiveslides.css" />
    <link rel="stylesheet" href="./resource/home/css/responsive.css">

    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="./resource/home/js/html5.js"></script>
    <script src="./resource/home/js/css3-mediaqueries.js"></script>
    <![endif]-->
    <link href='./resource/home/images/favicon.ico' rel='icon' type='image/x-icon'/>

    <script src="./resource/home/js/jquery.min.js"></script>
    <script src="./resource/home/js/responsiveslides.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                maxwidth: 960,
                namespace: "centered-btns"
            });
        });
    </script>

</head>
<body>
<!--------------Header--------------->
<header>
    <div class="zerogrid">
        <div class="row">
            <div class="col05">
                <div id="logo"><a href="index.php"><img src="./resource/home/images/logo.png"/></a></div>
            </div>
            <div class="col06 offset05">
                <div id='search-box'>
                    <form action="{{u('home/search/index')}}" id='search-form' method='post' target='_top'>
                        <input id='search-text' name='search' placeholder='type here' type='text'/>
                        <button id='search-button' type='submit'><span>搜索</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!--------------Navigation--------------->

<style>
    .nav{
        background: #392E2B;
        border: 1px solid #423531;
    }
</style>
<nav class="nav">
    <ul>
        <li><a href="index.php">首页</a></li>
        <foreach from="$cateData" key="$k" value="$v">
        <li><a href="{{u('home/listpage/index',[cid=>$v['cid']])}}">{{$v['cname']}}</a></li>
        </foreach>
    </ul>
</nav>


<!--------------Content--------------->
<section id="content">
    <div class="zerogrid">
        <div class="row block">

            <div class="featured col16">
                <div class="rslides_container">
                    <ul class="rslides" id="slider">
                        <li><img src="./resource/home/images/1.jpg"/></li>
                        <li><img src="./resource/home/images/2.jpg"/></li>
                        <li><img src="./resource/home/images/3.jpg"/></li>
                        <li><img src="./resource/home/images/4.jpg"/></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar col05">
                <section>
                    <div class="heading">关于自己</div>
                    <div class="content">
                        <img style="width: 105px;" src="./resource/home/images/jinsanpang.jpg"/>
                        <p style="margin-left: 5px;"><span style="font-size: 16px;font-weight: bold;">金三胖</span>（朝鲜语：김정은，1983年1月8日－），现任朝鲜最高领导人，朝鲜民主主义人民共和国元帅，朝鲜劳动党委员长[1] ，朝鲜劳动党中央军事委员会委员长，朝鲜国务委员会委员长，朝鲜人民军最高司令官。金正恩是朝鲜第二代最高领导人金正日幼子、第一代最高领导人金日成之孙。</p>
                    </div>
                </section>
                <section>
                    <div class="heading">分类列表</div>
                    <div class="content" style="text-align: center;">
                            <foreach from="$allCateData" key="$k" value="$v">
                                <a  class="button" href="{{u('home/listpage/index',[cid=>$v['cid']])}}" style="margin-top: 5px;">{{$v['cname']}}</a>
                            </foreach>

                    </div>
                </section>
                <section>
                    <div class="heading">标签云</div>
                        <div class="content" style="text-align: center;">
                            <foreach from="$tigData" key="$k" value="$v">
                                <a  class="button" href="{{u('home/listpage/index',[tid=>$v['tid']])}}" style="margin-top: 5px;">{{$v['tname']}}({{$v['total']}})</a>
                            </foreach>
                        </div>
                </section>
                <section>
                    <div class="heading">最新文章</div>
                    <div class="content" style="">
                        <foreach from="$articleData" key="$k" value="$v">
                        <section style="margin-right: 19px;">
                            <img  src="{{$v['thumb']}}"/>
                            <h4 ><a  href="{{u('home/content/index',[aid=>$v['aid']])}}">{{$v['title']}}</a></h4>
                            <p>{{$v['digest']}}</p>
                        </section>
                        </foreach>
                    </div>
                </section>
            </div>

            <div class="main-content col11">
                <blade name="content"/>
            </div>

        </div>
    </div>
</section>
<!--------------Footer--------------->
<footer>
    <div class="zerogrid">
        <div class="row">
            <section class="col-1-3">
                <div class="heading">分类列表</div>
                    <div class="content" style="text-align: center;">
                        <ul>
                            <foreach from="$allCateData" key="$k" value="$v">
                                <li style="float: left;padding: 2px; " class="button"><a   href="{{u('home/listpage/index',[cid=>$v['cid']])}}">{{$v['cname']}}</a></li>
                            </foreach>
                        </ul>
                    </div>
            </section>
            <section class="col-1-3">
                <div class="heading">标签云</div>
                    <div class="content">
                        <ul>
                            <foreach from="$tigData" key="$k" value="$v">
                            <li style="float: left;padding: 3px;" class="button"><a href="{{u('home/listpage/index',[tid=>$v['tid']])}}">{{$v['tname']}}</a></li>
                            </foreach>
                        </ul>
                    </div>
            </section>
            <section class="col-1-3">
                <div class="heading">友情链接</div>
                <div class="content">
                    <ul>
                        <foreach from="$linkData" key="$k" value="$v">
                            <li><a href="http://{{$v['url']}}">{{$v['lname']}}</a></li>
                        </foreach>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</footer>

<div id="copyright">
    <p>联系我 :&nbsp;<a href="#"> {{$webSetData['admin']}}</a>&nbsp;&nbsp;{{$webSetData['blog']}}&nbsp;&nbsp;{{$webSetData['demo']}} </p>
</div>

</body></html>