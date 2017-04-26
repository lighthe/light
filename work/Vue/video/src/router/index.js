import Vue from 'vue'
import Router from 'vue-router'

import Home from '@/components/Home'

import Video from '@/components/Video'

import Page from '@/components/Page'

Vue.use(Router)

export default new Router({
    //路由
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
      {
          path: '/Video/:id',
          name: 'Video',
          component: Video
      },
      {
          path: '/Page',
          name: 'Page',
          component: Page
      },
  ]
})
