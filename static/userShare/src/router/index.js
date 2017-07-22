import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'
import Share from '@/components/Share'
import getShare from '@/components/getShare'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            redirect: '/index',
        },
        {
            path: '/index',
            name: 'index',
            component: Index
        },
        {
            path: '/share',
            name: 'share',
            component: Share
        },
        {
            path: '/getShare',
            name: 'getShare',
            component: getShare
        }
  ]
})
