import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

Vue.config.productionTip = false

import './assets/scss/spectre/spectre.scss'
import './assets/scss/spectre/spectre-exp.scss'
import './assets/scss/spectre/spectre-icons.scss'

Vue.prototype.$http = axios.create({
  baseURL: 'http://172.16.0.91:8000/api/',
  timeout: 3000,
})

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
