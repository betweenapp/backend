<template>
  <b-navbar>

  </b-navbar>
</template>

<script>
import { mapState } from 'vuex'

export default {
  props: {
    sidenavToggle: {
      type: Boolean,
      default: true
    }
  },

  computed: {
    ...mapState('me', {
      name: state => state.data.name,
      email:  state => state.data.email,
      avatar:  state => state.data.avatar
    })
  },

  methods: {
    toggleSidenav () {
      this.layoutHelpers.toggleCollapsed()
    },

    getLayoutNavbarBg () {
      return this.layoutNavbarBg
    }
  }
}
</script>

<style scoped>
.layout-navbar {
  min-height: 66px;
}
.app-brand {
  min-height: 50px;
}
.collapse.show {
  display: block;
}
</style>
