<template>
    <div>
        <!--推荐视频-->
        <h2>推荐视频</h2>

        <div id="recommend">

            <router-link :to="{name:'Video',params:{id:v.id,cid:v.cid}}" v-for="v in commend" :key="v.id">
                <img :src="'http://bxu2442260694.my3w.com/hdvideo/'+v.pic" alt="" />
                <i class="iconfont icon-bofang"></i>
                <!--如何获取播放时间-->
                <span class="time">22:56</span>
                <span class="title">{{v.title}}</span>
            </router-link>

        </div>
        <!--推荐视频结束-->

        <router-link  to="/Page" class="more">MORE ></router-link>
    </div>
</template>

<script>
    export default {
        name: 'Commend',
        //数据
        props:['commend'],

    }
</script>

