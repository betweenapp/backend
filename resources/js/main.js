import Vue from 'vue'
import App from './App'
import BootstrapVue from 'bootstrap-vue'

require('bootstrap')

new Vue({
  render: h => h(App)
}).$mount('#backend')
