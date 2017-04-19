<template>

   <div>
      <Slide :slides="pics"></Slide>
      <Commend></Commend>
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
        data () {
            return {
                pics:[
                    {id: 1, pic: './static/images/1.jpg'},
                    {id: 2, pic: './static/images/2.jpg'},
                    {id: 3, pic: './static/images/3.jpg'},
                    {id: 4, pic: './static/images/4.jpg'},
                ],

                msg: 'Welcome to Your Vue.js App'
            }
        },
        components:{Commend,Hot,Navigate,Slide}
    }
</script>
