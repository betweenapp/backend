import ApiService from "./api.service";
import { TokenService } from "./storage.service";
import {ValidationError} from "../errors/ValidationError";

class AuthenticationError extends Error {

  constructor(errorCode, message, hint, description) {
    super(message)
    this.name = this.constructor.name
    this.message = message
    this.hint = hint
    this.description = description
    this.errorCode = errorCode
  }

}

const UserService = {


  validateLogin: async function(email, password) {

    const requestData = {
      method: 'POST',
      url: '/betweenapp/backend/login',
      data: { email, password }
    }

    try {
      const response = await ApiService.customRequest(requestData)
      return this.login(email,password)
    } catch (e) {
      throw new ValidationError(e.response.status, e.response.statusText, e.response.data.errors)
    }


  },

  /**
   * Login the user and store the access token to TokenService.
   *
   * @returns access_token
   * @throws AuthenticationError
   **/
  login: async function(email, password) {
    const requestData = {
      method: 'post',
      url: "/oauth/token/",
      data: {
        grant_type: 'password',
        username: email,
        password: password,
        scope: '*',
        client_id: process.env.MIX_BETWEENAPP_CLIENT_ID,
        client_secret: process.env.MIX_BETWEENAPP_CLIENT_SCECRET,
      },
    }

    try {
      const response = await ApiService.customRequest(requestData)

      TokenService.saveToken(response.data.access_token)
      TokenService.saveRefreshToken(response.data.refresh_token)
      ApiService.setHeader()

      ApiService.mount401Interceptor();
      return response.data.access_token
    } catch (error) {

      throw new AuthenticationError(
        error.response.status,
        error.response.data.message,
        error.response.data.hint,
        error.response.data.description
      )
    }
  },

  /**
   * Refresh the access token.
   **/
  refreshToken: async function() {
    const refreshToken = TokenService.getRefreshToken()

    const requestData = {
      method: 'post',
      url: "/o/token/",
      data: {
        grant_type: 'refresh_token',
        refresh_token: refreshToken,
        client_id: process.env.MIX_BETWEENAPP_CLIENT_ID, //process.env.VUE_APP_CLIENT_ID,
        client_secret: process.env.MIX_BETWEENAPP_CLIENT_SCECRET, //process.env.VUE_APP_CLIENT_SECRET
        scope: '*'
      },
    }

    try {
      const response = await ApiService.customRequest(requestData)

      TokenService.saveToken(response.data.access_token)
      TokenService.saveRefreshToken(response.data.refresh_token)
      // Update the header in ApiService
      ApiService.setHeader()

      return response.data.access_token
    } catch (error) {
      throw new AuthenticationError(error.response.status, error.response.data.detail)
    }

  },

  /**
   * Logout the current user by removing the token from storage.
   *
   * Will also remove `Authorization Bearer <token>` header from future requests.
   **/
  logout() {
    // Remove the token and remove Authorization header from Api Service as well
    TokenService.removeToken()
    TokenService.removeRefreshToken()
    ApiService.removeHeader()

    // NOTE: Again, we'll cover the 401 Interceptor a bit later.
    ApiService.unmount401Interceptor()
  }

}

export default UserService

export { UserService, AuthenticationError }