import ApiService from "./api.service";

const ContextService = {

  /**
   *
   * @returns {Promise<*>} | Context Collection
   */
  all: async function() {
    const requestData = {
      method: 'GET',
      url: 'context'
    }

    try {
      const response = await ApiService.customRequest(requestData)

      return response.data.data

    } catch (e) {

    }
  }

}

export default ContextService

export { ContextService }
