<template>
    <div id="app">
        <!--<img src="./assets/logo.png">-->
        <transition enter-active-class="animated flip">
        <router-view></router-view>
        </transition>
    </div>
</template>
<script>
    import Home from '@/components/Home'
    export default {
        name: 'app',
        components:{
            Home
        }
    }
</script>
