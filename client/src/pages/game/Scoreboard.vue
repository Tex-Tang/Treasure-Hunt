<template>
  <div class="scoreboard-page">
    <router-link to="/game" class="btn btn-link back-btn" tag="a">
			<i class="icon icon-back"></i>
		</router-link>
    <div class="score-list">
      <div class="score-box" v-for="(group,n) in groups" :key="n">
        <div class="rank">{{n + 1}}</div>
        <div class="name">{{ group.group_name }}</div>
        <div class="score">{{ group.score }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Cookies from 'js-cookie'
export default {
	data(){
		return{
			groups: []
		}
	},
	mounted(){
		this.$http.get("/game/scoreboard", {
			params: {
				api_token: Cookies.get("API_TOKEN")
			}
		}).then((res) => {
			if(res.data.result != "FAIL"){
        this.groups = res.data.data
        this.groups.sort((a, b) => { a.score > b.score });
			}  
    })
	}
}
</script>

<style lang="scss">
.scoreboard-page{
  margin-top: 3rem;
  .score-box{
    display: flex;
    padding: .25rem .5rem;
    .rank{
      width: 2rem;
      font-weight: 700;
    }
    .name{
      width: 100%;
    }
    .score{
      font-weight: 700;
    }
    &.active{
      background-color: black;
      color: white;
    }
  }
  .back-btn{
		position: fixed;
		top: .5rem;
		left: .5rem;
	}
}
</style>