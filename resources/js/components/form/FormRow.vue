<template>
  <div class="form-row">
    <component :is="child.alias"
               v-for="(child, index) in children"
               v-model="form[child.field]"
               :form="form"
               :error="errors[child.field] ? errors[child.field][0] : null "
               :key="index"
               v-bind="child"></component>
  </div>
</template>

<script>
  export default {
    props: {
      value: {
        type: Object,
        required: false,
        default() {
          return {};
        }
      },
      alias: {
        type: String,
        required: true
      },
      children: {
        type: Array,
        required: false,
        default() { return [] }
      },
      errors: {
        type: Object,
        required: true
      }
    },

    computed: {
      form: {
        get () { return this.value },
        set (form) { return form }
      }
    }

  }
</script>

<style scoped>

</style>