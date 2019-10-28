import { AuthenticationError } from './../services/user.service'
import {ValidationError} from "../errors/ValidationError";

const formPlugin = {
  install (Vue, options) {
    //Register form components


    Vue.component('ba-form', require('../components/form/BaseForm').default)
    Vue.component('ba-form-row', require('../components/form/FormRow').default)
    Vue.component('ba-text-input', require('../components/form/Inputs/TextInput').default)

    Vue.mixin({

      methods: {
        async login(Vue, data) {

          try {
            const response = await Vue.$auth.validateLogin(data.email, data.password)
            Vue.$router.push({ path: Vue.$route.query.redirect })
          } catch (e) {
            if (e instanceof AuthenticationError) {
              Vue.errors = { email: [ e.hint ] }

            } else if (e instanceof ValidationError) {
              Vue.errors = e.errors
            }


          }


        }
      }

    })

  }
}

export default formPlugin