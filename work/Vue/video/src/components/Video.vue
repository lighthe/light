<template>
    <div>
        <!--视频-->
        <video src="images/big_buck_bunny.mp4" controls="controls" poster="./static/images/510.jpg"></video>
        <!--视频结束-->

        <h1>10 导航条样式的设置</h1>

        <ul id="list">
            <li><a href="">07 w3c规范 创建网页的方法</a></li>
            <li class="cur"><a href="">08 a标签 img标签详解</a></li>
            <li><a href="">09 代码注释</a></li>
            <li><a href="">07 w3c规范 创建网页的方法</a></li>
            <li><a href="">08 a标签 img标签详解</a></li>
            <li><a href="">09 代码注释</a></li>
            <li><a href="">07 w3c规范 创建网页的方法</a></li>
            <li><a href="">08 a标签 img标签详解</a></li>
            <li><a href="">09 代码注释</a></li>
            <li><a href="">08 a标签 img标签详解</a></li>
            <li><a href="">09 代码注释</a></li>
            <li><a href="">07 w3c规范 创建网页的方法</a></li>
            <li><a href="">08 a标签 img标签详解</a></li>
            <li><a href="">09 代码注释</a></li>
            <li><a href="">08 a标签 img标签详解</a></li>
            <li><a href="">09 代码注释</a></li>
            <li><a href="">07 w3c规范 创建网页的方法</a></li>
            <li><a href="">08 a标签 img标签详解</a></li>
            <li><a href="">09 代码注释</a></li>
            <li><a href="">08 a标签 img标签详解</a></li>
            <li><a href="">09 代码注释</a></li>
            <li><a href="">07 w3c规范 创建网页的方法</a></li>
            <li><a href="">08 a标签 img标签详解</a></li>
            <li><a href="">09 代码注释</a></li>
        </ul>
        <!--返回按钮-->
        <router-link to="/" class="iconfont back">&#xe612;</router-link>
    </div>
</template>

<script>
    //载入样式
    require('@/assets/css/page.css')

    export default {
        name: 'Video',

        mounted:function(){
            this.axios.get('http://c79_hehui.kuaipinwang.com/video/index.php?s=api/lesson/video&id=' + this.$route.params.id)
                .then((response) => {
//          console.log(response.data)
                    if(response.data.valid){
                        //this指的是下面的data数据，把接受过来的数据赋给data
                        this.data = response.data.data   ;

                    }else{
                        alert('请求失败')
                    }
                })
        },
        data () {
            return {

            }
        }
    }
</script>


