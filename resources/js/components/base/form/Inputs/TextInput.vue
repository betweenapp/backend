<template>
  <div class="text-input">
    <b-form-group
        :id="'fieldset-' + field"
        :description="description"
        :label="label"
        :disabled="disabled"
        :invalid-feedback="error"
        :state="state">
      <b-form-input
          :id="'input-' + field"
          type="text"
          v-model="localValue"
          :state="state"
          :placeholder="placeholder"
          trim />
    </b-form-group>

  </div>
</template>

<script>
  export default {
    props: {
      value: {
        type: String|Number,
        required: false,
        default: null
      },
      field: {
        type: String,
        required: true
      },
      form: {
        type: Object,
        required: true
      },
      error: {
        type: String,
        required: false,
        default: null
      },
      description: {
        type: String,
        required: false,
        default: null
      },
      label: {
        type: String,
        required: false,
        default: null
      },
      disabled: {
        type: Boolean,
        required: false,
        default: false
      },
      placeholder: {
        type: String,
        required: false,
        default: null
      }
    },

    computed: {
      state() {
        return this.error !== null ? false : this.error
      },
      localValue: {
        get() { return this.value },
        set(value) { this.$emit('input', value) }
      }
    }

  }
</script>

<style scoped>

</style>