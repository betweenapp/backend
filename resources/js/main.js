import Vue from 'vue'
import App from './App'
import router  from './routes'
import FormPlugin from './plugins/FormPlugin'
import ApiServicePlugin from "./plugins/ApiServicePlugin";
import BootstrapVue from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


Vue.use(BootstrapVue);
Vue.use(ApiServicePlugin);
Vue.use(FormPlugin);

require('bootstrap')



new Vue({
  router,
  render: h => h(App)
}).$mount('#backend')
