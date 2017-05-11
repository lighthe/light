<template>
    <div>
        <!--视频-->
        <video :src="video.path" controls="controls" autoplay="autoplay" poster="./static/images/510.jpg" ></video>
        <!--视频结束-->

        <h1>{{video.title}}</h1>

        <ul id="list">
                                                                            <!--动态class-->
            <li v-for="v in data" :key="data.id" @click.prevent="change(v)" :class="{cur:v.path==video.path}"><a href="">{{v.title}}</a></li>
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
        //获取数据
        mounted:function(){
            this.axios.get('http://bxu2442260694.my3w.com/hdvideo/index.php?s=admin/JieKou/video&cid=' + this.$route.params.cid)
                .then((response) => {
          console.log(response.data)
                    if(response.data.valid){
                        //this指的是下面的data数据，把接受过来的数据赋给data
                            this.data = response.data.data ;
                            //默认当前的播放的视频
                            this.video=response.data.data[ this.$route.params.id];
                    }else{
                        alert('请求失败')
                    }
                })
        },


            //方法
        methods:{
            change:function (current) {
                this.video=current
            }
            
        },

        //数据
        data () {
            return {
                data:[],
                video:[],
            }
        }
    }
</script>


