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
    <form class="form">
      <input class="form-input" type="text" placeholder="Enter Code" v-model="answer">
      <router-link to="/game/gameinstruction/" tag="div" class="btn btn-primary">Proceed</router-link>
    </form>
  </div>
</template>

<script>
import Cookies from 'js-cookie'
export default {
  methods:{
    submitAnswer () {
      this.$http.post("/game/GameInstruction/answer?api_token=" + Cookies.get("API_TOKEN"), {
        id: this.$route.params.id,
        answer: this.answer
      }).then((res) => {
        if(res.data.result != "FAIL"){
          if(res.data.data.correct){
            alert("Proceed")
            this.$router.push('/game/GameInstruction')
          }else{
            alert("Wrong code!")
          }
        }else{
          alert(res.data.error_message)
          this.$router.push('/game/GameInstruction')
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
}
</style>