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
          name: 'Questions',
          path: '',
          component: () => import('../pages/game/question/List.vue')
        },
        {
          name: 'Question',
          path: 'question/:id',
          component: () => import('../pages/game/question/Single.vue')
        },
        {
          name: 'Scoreboard',
          path: 'scoreboard',
          component: () => import('../pages/game/Scoreboard.vue')
        },
      ]
    }
  ]
})

export default router
