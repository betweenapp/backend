<template>
  <div class="betweenapp-container with-side-nav">
    <div class="betweenapp-container-left">
      <slot name="sidenav"/>
    </div>
    <div class="betweenapp-container-right">
      <slot name="navbar"/>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: "LayoutInside"
}
</script>

<style scoped lang="scss">
</style>
