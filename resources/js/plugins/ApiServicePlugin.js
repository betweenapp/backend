import ApiService from "../services/api.service";
import AuthService from "../services/user.service";
import { TokenService } from "../services/storage.service";
const ApiServicePlugin =  {

  install(Vue, options) {

    ApiService.init('/api')
    if (TokenService.getToken()) {
      ApiService.setHeader()
    }

    Vue.prototype.$api = ApiService
    Vue.prototype.$auth = AuthService

  }

}

export default ApiServicePlugin