<template>
  <div id="backend">
    <router-view :key="$route.fullPath"></router-view>
  </div>
</template>

<script>
export default {
  name: "App"
}
</script>

<style scoped>

</style>
