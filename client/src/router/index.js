import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
  routes : [
    {
      path: "/",
      component: () => import('../pages/Homepage.vue')
    },
    {
      path: '/',
      component: () => import('../layouts/entry.vue'),
      children: [
        {
          path: 'register',
          component: () => import('../pages/entry/Register.vue')
        },
        {
          path: 'login',
          component: () => import('../pages/entry/Login.vue')
        }
      ]
    },
    {
      path: '/game',
      component: () => import('../layouts/game.vue'),
      children: [
        {
          path: '',
          component: () => import('../pages/game/question/list.vue')
        },
        {
          path: 'question',
          component: () => import('../pages/game/question/single.vue')
        }
      ]
    }
  ]
})

export default router
