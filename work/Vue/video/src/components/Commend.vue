<template>
    <div>
        <!--推荐视频-->
        <h2>推荐视频</h2>

        <div id="recommend">

            <router-link :to="{name:'Video',params:{id:v.id}}" v-for="v in data" :key="v.id">
                <img src="../assets/images/4.jpg" alt="" />
                <i class="iconfont icon-bofang"></i>
                <span class="time">22:56</span>
                <span class="title">{{v.title}}</span>
            </router-link>

            <!--<a href="">-->
                <!--<img src="../assets/images/5.jpg" alt="" />-->
                <!--<i class="iconfont icon-bofang"></i>-->
                <!--<span class="time">22:56</span>-->
                <!--<span class="title">谷歌：没有扫描仪也能</span>-->
            <!--</a>-->

            <!--<a href="">-->
                <!--<img src="../assets/images/6.jpg" alt="" />-->
                <!--<i class="iconfont icon-bofang"></i>-->
                <!--<span class="time">22:56</span>-->
                <!--<span class="title">谷歌：没有扫描仪也能</span>-->
            <!--</a>-->
            <!--<a href="">-->
                <!--<img src="../assets/images/7.jpg" alt="" />-->
                <!--<i class="iconfont icon-bofang"></i>-->
                <!--<span class="time">22:56</span>-->
                <!--<span class="title">谷歌：没有扫描仪也能</span>-->
            <!--</a>-->
        </div>
        <!--推荐视频结束-->

        <a href="" class="more">MORE ></a>
    </div>
</template>

<script>
    export default {
        name: 'Commend',
        //向后台获取数据
        //向后台拿数据使用的是vue-axios安装配置
        mounted:function(){

            this.axios.get('http://c79_hehui.kuaipinwang.com/video/index.php?s=api/lesson/lists')
                .then((response) => {
//                 console.log(response.data)
                    if(response.data.valid){
                        //this指的是下面的data数据，把接受过来的数据赋给data
                        this.data = response.data.data  ;
                    }else{
                        alert('请求失败')
                    }
                })
        },
        data () {
            return {
                data:[]
            }
        }

    }
</script>

