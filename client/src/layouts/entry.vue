<template>
  <div class="entry-layout">
    <div class="action-bar">
      <router-link to="/" tag="a" class="btn btn-link" v-if="$route.name == 'Register' || $route.name == 'Login'">
        <i class="icon icon-back"></i>
      </router-link>
    </div>
    <div class="entry-main">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Cookies from 'js-cookie'
export default {
  data: () => ({
    username: "",
    password: "",
  }),
  mounted(){
    this.$http.get("/user", {
			params: {
				api_token: Cookies.get("API_TOKEN")
			}
		}).then((res) => {
			this.$router.push('/game')
		})
  }
}
</script>

<style lang="scss" scoped>
.action-bar{
  max-width: 320px;
  margin: 1rem auto 0 auto;
}
</style>
