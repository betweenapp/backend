<template>
  <h1>Hello from Listing</h1>
</template>

<script>
  export default {
    name: "Listing",
    data() {
      return {
        definition: {},
        entities: [],
        meta: {},
      }

    },

    inject: ["fetch"],
    async created() {
      const data = await this.fetch(
        this.meta.current_page ? this.meta.current_page : null,
        this.definition.sort
      )

      this.definition = data.list
      this.entities = data.data.records
      this.meta = data.meta

    }

  }
</script>

<style scoped>

</style>