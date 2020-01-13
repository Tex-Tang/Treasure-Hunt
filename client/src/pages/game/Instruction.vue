<template>
  <div class="instruction-page">
    <h4>Game Instructions</h4>
    <p>
    
    <ul>
        <li>For each question, you will be given 3 chances to right answer, after the 3rd attempt the question will be automaticaly removed and no points will be awarded.</li>
        <li>If your group submits consecutive correct answers, bonus points will be awarded.</li>
        <li>For answers involving the NAMES of MCKL Staff, please type names in FULL.</li>
        <li>For answers involving QUANTITIES, please input numerals. Eg. 10, 200 etc </li>
        <li>Pay attention to the hints given to validate your answers.</li>
        <li>For this Treasure Hunt, a live scoreboard with your score and placing will be displayed right under the questions. </li>
        <li>The 1st place will be awarded a special prize.</li>
    </ul>
    </p>

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