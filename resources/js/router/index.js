import Vue from 'vue'

import VueRouter from 'vue-router'
Vue.use(VueRouter)

const home = require('../pages/home.vue').default
const about = require('../pages/about.vue').default
import NotFound from '../pages/NotFound.vue'
import user from '../pages/user.vue'
import profile from '../pages/profile.vue'
import register from '../pages/register.vue'
import editUser from '../pages/editUser.vue'
import uploadPhoto from '../pages/uploadPhoto.vue'

const routes = [{
        name: 'home',
        path: '/home',
        component: home
    },
    {
        name: 'about',
        path: '/about',
        component: about
    },
    {
        name: 'user',
        path: '/user',
        component: user,
    },
    {
        name: 'register',
        path: '/user/create',
        component: register,
    },
    {
        name: 'profile',
        path: '/user/:id',
        component: profile,
        props: true
    },
    {
        name: 'upload',
        path: '/user/:id/photo',
        component: uploadPhoto,
        props: true
    },
    {
        name: 'edit',
        path: '/user/:id/edit',
        component: editUser,
        props: true
    },
    {
        path: '*',
        component: NotFound
    }
]

const router = new VueRouter({
    linkActiveClass: 'active',
    mode: 'history',
    routes
})

export default router