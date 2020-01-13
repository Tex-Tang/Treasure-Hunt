<template>
  <div class="register-page">
    <form class="form" @submit.prevent="register">
      <h5>Group's info</h5>
      <div class="columns">
        <div class="column col-12">
          <div class="form-group">
            <input type="text" class="form-input" placeholder="Group's name" v-model="data.group_name">
          </div>
        </div>
        <div class="column col-12">
          <p class="strong" style="margin: 1rem 0 .5rem 0;">Group members</p>
          <div class="columns" v-for="(member, ind) in data.group_members" :key="'member-' + ind">
            <div class="column col-12">
              <div class="form-group">
                <input type="text" class="form-input" placeholder="Name" v-model="member.name">
              </div>
            </div>
            <!--
            <div class="column col-6">
              <div class="form-group">
                <input type="text" class="form-input" placeholder="Student ID" v-model="member.student_id">
              </div>
            </div>
            -->
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
    data: {
      group_name: "",
      group_members: [
        { name: "" },//, student_id: "" },
        { name: "" },//, student_id: "" },
        { name: "" },//, student_id: "" },
        { name: "" }//, student_id: "" }
      ]
    }
  }),
  methods: {
    register: function() {
      this.$http.post("register", this.data).then((data) => {
        if(data.data.result == "FAIL"){
          alert(data.data.data.group_name)
        } else{
          Cookies.set('API_TOKEN', data.data.data.token)
          this.$parent.username = data.data.data.username
          this.$parent.password = data.data.data.password
          this.$router.push("/success")
        }
      })
    }
  }
}
</script>

<style lang="scss">
.form{
  max-width: 300px;
  margin: 2rem auto;
  .column{
    margin-bottom: .5rem;
  }
}
</style>