<template>
  <ul class="list-unstyled">
    <li class="list-inline-item" v-for="column in list.columns">
      {{  }}
      {{ column.label }}
    </li>
  </ul>
</template>

<script>
export default {
  props: ['list']
}
</script>

<style scoped>

</style>
