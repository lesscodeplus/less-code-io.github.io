import Vue from 'vue'
import App from './App.vue'
import Cookies from './Cookies.vue'
import router from './router'
import  './element'

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')

new Vue({
  router,
  render: h => h(Cookies),
}).$mount('#cookies')
