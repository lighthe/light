<extend file='resource/view/home'/>
<block name="content">
    <parent name="header" title="这是标题">
        <foreach from="$artData" key="$k" value="$v">
        <article>
            <div class="heading">
                <h2>{{$v['title']}}</h2>
                <p class="info">+ 作者 by {{$v['author']}} - {{date('Y/m/d',$v['sendtime'])}}- 分类： <a href="{{u('home/listpage/index',[cid=>$v['cid']])}}">{{$v['cname']}}</a></p>
            </div>
            <div class="content">
                <img src="{{$v['thumb']}}" style="width: 100%"/>
                <br/>
                <p style="font-size: 16px;font-weight: bold;">{{$v['digest']}}</p>
            </div>
            <div class="footer">
                <p class="more"><a class="button" href="{{u('home/content/index',[aid=>$v['aid']])}}">请阅读 >></a></p>
            </div>
        </article>
        </foreach>
        <style>
            nav{
                background: none;
                border: none;

            }

        </style>
        {{$page}}
        <parent name="footer">
</block>