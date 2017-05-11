<template>

   <div>
      <Slide :slides="data"></Slide>
      <Commend :commend="data"></Commend>
      <Hot></Hot>
      <Navigate></Navigate>
   </div>

</template>

<script>
   //推荐
    import Commend from '@/components/Commend';
    //热门
    import Hot from '@/components/Hot';
   //底部
   import Navigate from '@/components/Navigate';

   import Slide from '@/components/Slide';


   require('@/assets/css/index.css');

    export default {
        name: 'Home',
        //发送数据到后台
        mounted:function(){
            //ajax插件
            this.axios.get('http://bxu2442260694.my3w.com/hdvideo/index.php?s=admin/JieKou/video&mun=')
                .then((response) => {
                 console.log(response.data)
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
                data:[
                ],

            }
        },


        components:{Commend,Hot,Navigate,Slide}
    }
</script>
