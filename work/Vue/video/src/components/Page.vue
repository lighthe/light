<template>
    <div>
        <Pheader :pheader="data"></Pheader>
        <Pcontent :pcontent="data"></Pcontent>
        <Navigate></Navigate>
    </div>

</template>

<script>
    //头
    import Pheader from '@/components/Pheader';
    //内容
    import Pcontent from '@/components/Pcontent';
    //底部
    import Navigate from '@/components/Navigate';
    //样式
    require('@/assets/css/video.css')

    export default {
        name: 'Page',

        data () {
            return {
                data:[],
            }
        },
        components:{Pheader,Navigate,Pcontent},
    }

</script>

