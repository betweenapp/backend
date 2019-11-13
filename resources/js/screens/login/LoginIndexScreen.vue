<template>
    <div class="login-screen d-flex justify-content-center align-items-center">
      <b-card>
        <component :is="config.alias" v-bind="config" v-if="config" />
      </b-card>
    </div>
</template>

<script>
import ApiService from "../../services/api.service";
import BaseForm from "../../components/base/form/BaseForm";

export default {
  mounted() {
    this.getFormDefinition()
  },

  data() {
    return {
      config: null
    }
  },

  methods: {
    async getFormDefinition() {

      const requestData = {
        method: 'GET',
        url: '/betweenapp/backend/login/create'
      }

      const response = await ApiService.customRequest(requestData);
      this.config = response.data
    }
  }
}
</script>

<style scoped lang="scss">
.login-screen {
  height: 100vh;
}
</style>
