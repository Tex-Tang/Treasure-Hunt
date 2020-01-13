<template>
  <div class="register-page">
    <form class="form" @submit.prevent="login">
      <h5>Login</h5>
      <div class="toast toast-error mb-2" v-if="error">
        You have entered an invalid username or password.
      </div>
      <div class="columns">
        <div class="column col-12">
          <div class="form-group">
            <input type="text" class="form-input" placeholder="Username ID" v-model="data.username">
          </div>
        </div>
        <div class="column col-12">
          <div class="form-group">
            <input type="password" class="form-input" placeholder="password" v-model="data.password">
          </div>
        </div>
      </div>
      <button class="btn" style="width: 100%"><i class="icon icon-forward"></i></button>
    </form>
  </div>
</template>

<script>
import Cookies from 'js-cookie'
export default {
  data: () => ({
    error: false,
    data: {
      username: "",
      password: ""
    }
  }),
  methods:{
    login: function () {
      this.$http.post("login", this.data).then((data) => {
        console.log(data)
        if(data.data.result == "FAIL") this.error = true;
        else{
          Cookies.set('API_TOKEN', data.data.data.api_token)
          this.$router.push("/game")
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.form{
  max-width: 300px;
  margin: 2rem auto;
  .column{
    margin-bottom: .5rem;
  }
}
</style>