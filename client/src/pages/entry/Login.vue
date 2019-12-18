<template>
  <div class="register-page">
    <form class="form">
      <h5>Login</h5>
      <div class="columns">
        <div class="column col-12">
          <div class="form-group">
            <input type="text" class="form-input" placeholder="Login ID" v-model="data.groupname">
          </div>
        </div>
        <div class="column col-12">
          <div class="form-group">
            <input type="password" class="form-input" placeholder="password" v-model="data.password">
          </div>
        </div>
      </div>
      <div class="btn" style="width: 100%" v-on:click="login"><i class="icon icon-forward"></i></div>
    </form>
  </div>
</template>

<script>
export default {
    data: () => ({
        data: {
            groupname: "",
            password: ""
        }
    }),
    methods:{
        login: function () {
            console.log("login")
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