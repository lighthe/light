<template>

            <!-- swiper -->
            <swiper :options="swiperOption" style="height: 50px;" ref="mySwiper">

                <swiper-slide v-for="v in data" :key="v.cid"  v-tap="{methods : cli,index:v.cid}" >{{v.ctitle}}</swiper-slide>

            </swiper>


</template>



<script>


    // swiper options example:
    export default {




        mounted:function(){
            //ajax插件
            this.axios.get('http://bxu2442260694.my3w.com/hdvideo/index.php?s=admin/JieKou/title')
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

        data() {
            return {
                swiperOption: {

                    pagination: '.swiper-pagination',
                    slidesPerView: 3,
                    paginationClickable: true,
                    spaceBetween: 30,

                    onTransitionStart(swiper){
                        console.log(swiper)
                    },
                },
                data:{}
            }
        },

        methods: {
            cli: function (index) {
              console.log(index.index)
            },

        }

    }
</script>



