<template>
  <div class="register-page">
    <form class="form">
      <h5>Group's info</h5>
      <div class="columns">
        <div class="column col-12">
          <div class="form-group">
            <input type="text" class="form-input" placeholder="Group's name" v-model="data.groupname">
          </div>
        </div>
        <div class="column col-12">
          <p class="strong" style="margin: 1rem 0 .5rem 0;">Group members</p>
          <div class="columns" v-for="(member, ind) in data.members" :key="'member-' + ind">
            <div class="column col-6">
              <div class="form-group">
                <input type="text" class="form-input" placeholder="Name" v-model="member.name">
              </div>
            </div>
            <div class="column col-6">
              <div class="form-group">
                <input type="text" class="form-input" placeholder="Student ID" v-model="member.id">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btn" style="width: 100%" v-on:click="register"><i class="icon icon-forward"></i></div>
    </form>
  </div>
</template>

<script>
export default {
  data: () => ({
    data: {
      groupname: "",
      members: [
        { name: "", id: "" },
        { name: "", id: "" },
        { name: "", id: "" },
        { name: "", id: "" }
      ]
    }
  }),
  methods: {
    register: function() {
      console.log("register")
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