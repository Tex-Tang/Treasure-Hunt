import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
  routes : [
    {
      path: '/',
      component: () => import('../layouts/entry.vue'),
      children: [
        {
          path: 'register',
          component: () => import('../pages/entry/Register.vue')
        },
        {
          path: "/",
          component: () => import('../pages/Homepage.vue')
        }
      ]
    }
  ]
})

export default router
