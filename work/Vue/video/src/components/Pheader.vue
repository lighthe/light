<template>

            <!-- swiper -->
            <swiper :options="swiperOption" style="height: 50px;">
                <swiper-slide>静态布局</swiper-slide>
                <swiper-slide>JavaScript</swiper-slide>
                <swiper-slide>PHP</swiper-slide>
                <swiper-slide>MySQL</swiper-slide>
                <swiper-slide>Node.js</swiper-slide>
                <swiper-slide>Vue.js</swiper-slide>
                <swiper-slide>Linux</swiper-slide>
                <swiper-slide>jQuery</swiper-slide>
                <swiper-slide>ThinkPhp</swiper-slide>
                <swiper-slide>Laravel</swiper-slide>
            </swiper>


</template>

<script>
    // import
    import Vue from 'vue'
    import VueAwesomeSwiper from 'vue-awesome-swiper'

    export default {
        data() {
            return {
                swiperOption: {
                    pagination: '.swiper-pagination',
                    slidesPerView: 3,
                    paginationClickable: true,
                    spaceBetween: 30
                }
            }
        }
    }
</script>