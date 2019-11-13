<template>
  <b-form>
    <h1>{{ title }}</h1>
    <ba-form-row
      v-for="(row, index) in rows"
      :key="index"
      v-bind="row"
      :errors="errors"
      v-model="form"/>
    <button @click.prevent="resolveAction">Hello</button>
  </b-form>
</template>

<script>
  export default {
    props: {
      data: {
        type: Object,
        required: true,
      },
      title: {
        type: String,
        required: true,
      },
      context: {
        type: String,
        required: true
      },
      namespace: {
        type: String,
        required: true
      },
      rows: {
        type: Array,
        required: true,
      },
      action: {
        type: String,
        require: false,
        default: ''
      }
    },

    data() {
      return {
        errors: {}
      }
    },

    computed: {
        form: {
            get() { return this.data },
            set(value) { this.$emit('input', value) }
        }
    },


    methods: {
      doAlert() {
        alert('Hello')
      },
      resolveAction() {
         eval(this.action)
      }
    }
  }
</script>

<style scoped>

</style>
