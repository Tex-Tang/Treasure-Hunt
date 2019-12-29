import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

Vue.config.productionTip = false

import './assets/scss/spectre/spectre.scss'
import './assets/scss/spectre/spectre-exp.scss'
import './assets/scss/spectre/spectre-icons.scss'

Vue.prototype.$http = axios.create({
  baseURL: 'http://178.128.126.127/treasure-hunt/api/',
  timeout: 3000,
})

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
