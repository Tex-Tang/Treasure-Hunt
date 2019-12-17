import Vue from 'vue'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false

import './assets/scss/spectre/spectre.scss'
import './assets/scss/spectre/spectre-exp.scss'
import './assets/scss/spectre/spectre-icons.scss'

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
