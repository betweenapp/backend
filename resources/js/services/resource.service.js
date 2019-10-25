import ApiService from "./api.service";
import { ValidationError } from "../../../../../../resources/assets/src/apps/common/errors/ValidationError";

class ResourceService {

  constructor(resourceName) {
    this.resourceName = resourceName
  }

  /**
   * Returns a collection of the resource
   * @param params
   * @returns {Promise<*>}
   */
  async list({ params }) {
    const requestData = {
      method: 'GET',
      url: this.resourceName,
      params: params
    }

    try {
      const response = await ApiService.customRequest(requestData)
      return response.data
    } catch (e) {
      console.log(e)
    }
  }

  /**
   * Creates a new resource
   * @param id
   * @param payload
   * @returns {Promise<void>}
   */
  async create(id, payload) {
    const requestData = {
      method: 'POST',
      url: `${this.resourceName}/${id}`,
      data: payload
    }

    try {
      const response = await ApiService.customRequest(requestData)
      return response.data.updated
    } catch (e) {
      if (e instanceof ValidationError) {
        throw new ValidationError(e.response.status, e.response.statusText, e.response.data.errors)
      }
    }
  }

  /**
   * Updates the resource
   * @param id
   * @param payload
   * @returns {Promise<*>}
   */
  async update(id, payload) {
    const requestData = {
      method: 'PUT',
      url: `${this.resourceName}/${id}`,
      data: payload
    }

    try {
      const response = await ApiService.customRequest(requestData)
      return response.data.updated
    } catch (e) {
      if (e instanceof ValidationError) {
        throw new ValidationError(e.response.status, e.response.statusText, e.response.data.errors)
      }
      console.log(e)
    }
  }

  /**
   * Returns the resource
   * @param id
   * @returns {Promise<*>}
   */
  async show(id)  {
    const requestData = {
      method: 'GET',
      url: `${this.resourceName}/${id}`,
    }

    try {
      const response = await ApiService.customRequest(requestData)
      return response.data.data
    } catch (e) {
      //Todo if there is no insurance found the we should redirect the uses to 404 Error Page
      console.log(e)
    }
  }

  async destroy(id) {
    const requestData = {
      method: 'DELETE',
      url: `${this.resourceName}/${id}`,
    }

    try {
      const response = await ApiService.customRequest(requestData)
      return response.data.updated
    } catch (e) {
      if (e instanceof ValidationError) {
        throw new ValidationError(e.response.status, e.response.statusText, e.response.data.errors)
      }
      console.log(e)
    }
  }

}

export default ResourceService

export { ResourceService }
