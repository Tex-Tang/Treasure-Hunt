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
          name: 'Register',
          path: 'register',
          component: () => import('../pages/entry/Register.vue')
        },
        {
          name: 'Login',
          path: 'login',
          component: () => import('../pages/entry/Login.vue')
        },
        {
          name: 'Success',
          path: 'success',
          component: () => import('../pages/entry/Success.vue')
        }
      ]
    },
    {
      path: '/game',
      component: () => import('../layouts/game.vue'),
      children: [
        {
          name: 'MMHActive',
          path: 'mmhactive',
          component: () => import('../pages/game/MMHActive.vue')
        },
        /*{
          name: 'Instruction',
          path: 'instruction',
          component: () => import('../pages/game/Instruction.vue')
        },*/
        {
          name: 'Instruction',
          path: 'instruction',
          component: () => import('../pages/game/Instruction.vue')
        },
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
    },
    {
      path: "*",
      redirect: "/login"
    }
  ]
})

export default router
