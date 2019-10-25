<template>
  <div class="login">
    Hello from login again
  </div>
</template>

<script>
import ApiService from "../../services/api.service";

export default {

  mounted() {
    this.getFormDefinition()
  },

  methods: {
    async getFormDefinition () {

      const requestData = {
        method: 'GET',
        url: 'api/betweenapp/backend/login/form-config'
      }

      const response = await ApiService.customRequest(requestData);
      console.log(response)
    }
  }
}
</script>

<style scoped>

</style>
