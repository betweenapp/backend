<template>
  <div class="list-screen container">
    <component :is="listing" />
  </div>
</template>

<script>

  import ListingDirector from "../../builders/ListingDirector";
  import ListingBuilder from "../../builders/ListingBuilder";

  export default {
    name: "ListIndexScreen",
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
      },

      listing () {
        return this.vendor ? new ListingDirector(
          new ListingBuilder( this.endpoint )
        ).makeListing() : null
      }

    },



  }
</script>

<style scoped>

</style>