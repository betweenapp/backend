<template>
  <div class="list-screen container">
    <list :endpoint="endpoint" />
  </div>
</template>

<script>
  import List from "../../components/list/index"

  export default {
    name: "ListIndexScreen",
    components: { List },
    props: {
      vendor: {
        type: String,
        required: true
      },
      package: {
        type: String,
        required: true
      },
      controller: {
        type: String,
        required: true
      }
    },


    computed: {

      endpoint() {
        return `${this.vendor}/${this.package}/${this.controller}`
      }

    },



  }
</script>

<style scoped>

</style>