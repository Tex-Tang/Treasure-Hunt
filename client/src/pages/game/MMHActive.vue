<template>
  <div class="instruction-page">
    <h4>SIGN UP<br>SUCCESSFUL</h4>
    <p>
      Get to the Mabel Marsh Hall as soon as possible!
    <br>
    <br>
      Once there, be patient and follow the instructions of the Orientation Facilitators.
    <br>
      When you are done, obtain the code from the Orientation Facilitators to proceed.
    </p>
    <br>
    <form class="form" @submit.prevent="submitAnswer">
      <input class="form-input" type="text" placeholder="Enter Code" v-model="answer">
      <button class="btn btn-primary mt-2">Proceed</button>
    </form>
  </div>
</template>

<script>
import Cookies from 'js-cookie'
export default {
  data: () => ({
    answer : "",
  }),
  mounted () {
    if(this.$parent.user.active){
      this.$router.push('/game')
    }
  },
  methods:{
    submitAnswer () {
      this.$http.post("/game/instruction/answer?api_token=" + Cookies.get("API_TOKEN"), {
        answer: this.answer
      }).then((res) => {
        if(res.data.result != "FAIL"){
          if(res.data.data.correct){
            alert("Proceed")
            this.$parent.user.active = true
            this.$router.push('/game/instruction')
          }
          else{
            alert("Wrong code!")
          }
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.instruction-page{
  margin: 4rem 0;
  .btn{
    width: 100%;
  }
  .form{
    width: 100%;
    max-width: 100%;
  }
}
</style>