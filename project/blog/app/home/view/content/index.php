<extend file='resource/view/home'/>
<block name="content">

    <parent name="header" title="这是标题">
        <article>
            <div class="heading">
                <h2>{{$artData['title']}}</h2>
                <p class="info">+ 作者 by {{$artData['author']}} - {{date('Y/m/d',$artData['sendtime'])}} -  <a
                            href="{{u('home/listpage/index',[cid=>$artData['cid']])}}"> {{$artData['cname']}}</a> </p>
            </div>
            <div class="content">
                {{$artData['content']}}</p>
            </div>
            <div class="footer">
                <ul style="border-top: 1px solid #eee;">
                    <foreach from="$artData['tag']" key="$k" value="$v">
                    <li style="float: left;"><a href="{{u('home/listpage/index',[tid=>$k])}}" >。{{$v}}。</a></li>&nbsp;
                    </foreach>
                </ul>
            </div>
        </article>
        <!-- UY BEGIN -->
        <div id="uyan_frame"></div>
        <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js"></script>
        <!-- UY END -->
        <parent name="footer">
</block>