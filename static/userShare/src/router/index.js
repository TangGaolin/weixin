import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            redirect: '/index',
        },
        {
            path: '/index',
            name: 'Index',
            component: Index
        },
        {
            path: '/userShare',
            name: 'userShare',
            component: Index
        }
  ]
})
