<template>
  <div class="entry-layout">
    <div class="action-bar">
      <router-link to="/" tag="a" class="btn btn-link">
        <i class="icon icon-back"></i>
      </router-link>
    </div>
    <div class="entry-main">
      <router-view></router-view>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.action-bar{
  max-width: 320px;
  margin: 1rem auto 0 auto;
}
</style>
