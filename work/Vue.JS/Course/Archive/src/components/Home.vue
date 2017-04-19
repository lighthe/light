<template>
    <div>
        <slide :slides="pics"></slide>
        <hot></hot>
        <commend></commend>
        <navigate></navigate>
    </div>
</template>

<script>
    import Commend from '@/components/Commend';
    import Hot from '@/components/Hot';
    import Navigate from '@/components/Navigate';
    import Slide from '@/components/Slide';
    require('@/assets/css/index.css');
    export default {
        name: 'home',
        data () {
            return {
                pics: [
                    {id: 1, pic: 'http://www.houdunwang.com/attachment/88111487764382.jpg'},
                    {id: 1, pic: 'http://hdcms.oss-cn-hangzhou.aliyuncs.com/1-01.jpg'},
                ],
                msg: 'houdunwang111.com'
            }
        },
        components: {Commend, Hot, Navigate, Slide}
    }
</script>