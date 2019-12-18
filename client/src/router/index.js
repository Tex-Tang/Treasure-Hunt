import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = []

const router = new VueRouter({
  routes : [
    {
      path: '/',
      component: () => import('../layouts/entry.vue'),
      children: [
        {
          path: 'register',
          component: () => import('../pages/entry/Register.vue')
        }
      ]
    }
  ]
})

export default router
