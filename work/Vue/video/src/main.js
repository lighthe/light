// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'

// start 请求数据
import axios from 'axios'
import VueAxios from 'vue-axios'
//end

Vue.use(VueAxios, axios)

Vue.config.productionTip = false


import vueTap from 'v-tap';
Vue.use(vueTap);

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: { App }
})
