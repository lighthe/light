import Vue from 'vue'
import Router from 'vue-router'
// import Hello from '@/components/Hello'
import Home from '@/components/Home'
import Page from '@/components/Page'
import Video from '@/components/Video'
Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/page',
            name: 'Page',
            component: Page
        },
        {
            path: '/video',
            name: 'Video',
            component: Video
        }
    ]
})
