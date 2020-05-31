import Vue from 'vue'
import App from './App.vue'
import Cookies from './Cookies.vue'
import router from './router'
import  './element'
import BackendServices from './lib/BackendServices';
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.config.productionTip = false

Vue.prototype.$scrollToTop = () => window.scrollTo(0,0)
Vue.use(BackendServices);
Vue.use(VueAxios, axios);

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')

new Vue({
  router,
  render: h => h(Cookies),
}).$mount('#cookies')
