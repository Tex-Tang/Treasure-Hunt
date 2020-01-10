<template>
  <div class="instruction-page">
    <h4>SIGN UP<br>SUCCESSFUL</h4>
    <p>Before beginning the hunt, please head to Mabel Marsh Hall to have your photo taken and acquire an access code to begin the hunt</p>
    <p>For Questions 1-4, type names in FULL of the following MCKL Staff.
       <br>
       For Questions that require quantities,please only input numerals.
       <br>
       For this Treasure Hunt, a live scoreboard with your score and placing will be displayed. Also, groups getting consecutive correct answers will also be awarded extra points. </p>
    <router-link to="/game/" tag="div" class="btn btn-primary">Proceed</router-link>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.instruction-page{
  margin: 4rem 0;
  .btn{
    width: 100%;
  }
}
</style>