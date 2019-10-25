import Vue from 'vue'
import App from './App'
import router  from './routes'
import BootstrapVue from 'bootstrap-vue'

require('bootstrap')

new Vue({
  router,
  render: h => h(App)
}).$mount('#backend')
