window.extensions = {

  methods: {
    async login(Vue, data) {
      console.log(Vue, data)


      const requestData = {
       method: 'POST',
       url: 'api/betweenapp/backend/login',
       data
      }

      const response = await Vue.$api.customRequest(requestData)

      if (response.status === 401) {
        console.log(response.data)
      }

    }
  }

}