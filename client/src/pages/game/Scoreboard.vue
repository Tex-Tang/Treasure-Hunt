<template>
  <div class="scoreboard-page">
    <div class="score-list">
      <div class="score-box" :class="n == 4 ? 'active' : ''" v-for="n in 10" :key="n">
        <div class="rank">{{n}}</div>
        <div class="name">Hello World</div>
        <div class="score">290</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss">
.scoreboard-page{
  margin-top: 3rem;
  .score-box{
    display: flex;
    padding: .25rem .5rem;
    .rank{
      width: 2rem;
      font-weight: 700;
    }
    .name{
      width: 100%;
    }
    .score{
      font-weight: 700;
    }
    &.active{
      background-color: black;
      color: white;
    }
  }
}
</style>