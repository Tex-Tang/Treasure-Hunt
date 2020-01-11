<template>
  <div class="success-page">
    <h4>SIGN UP<br>SUCCESSFUL</h4>
    <p>Please take a screenshot of your username and password for future reference</p>
    <div class="form-group">
      <label class="form-label">Username</label>
      <p v-text="username"></p>
    </div>
    <div class="form-group">
      <label class="form-label">Password</label>
      <p v-text="password"></p>
    </div>
    <router-link to="/game/mmhactive" tag="div" class="btn btn-primary">Proceed</router-link>
  </div>
</template>

<script>
export default {
  data: () => ({
    username: "",
    password: ""
  }),
  mounted(){
    if(this.$parent.username != "" && this.$parent.password != ""){
      this.username = this.$parent.username
      this.password = this.$parent.password
    }else{
      this.$router.push('/register')
    }
  }
}
</script>

<style lang="scss">
.success-page{
  max-width: 300px;
  margin: 2rem auto;
  .btn{
    width: 100%;
  }
  .form-group p{
    font-weight: 600;
    font-size: 1rem;
  }
}
</style>