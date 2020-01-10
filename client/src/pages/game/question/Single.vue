<template>
<div class="container">
  <div class="question-page">
		<router-link to="/game" class="btn btn-link back-btn" tag="a">
			<i class="icon icon-back"></i>
		</router-link>
		<div class="question">
			{{question.content}}
		</div>
		<form class="form" @submit.prevent="submitAnswer">
			<input class="form-input" type="text" placeholder="Answer" v-model="answer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
</template>

<script>
import axios from 'axios'
import Cookies from 'js-cookie'
export default {
	data(){
		return{
			question: {},
			answer: ""
		}
	},
	mounted(){
		this.$http.get("/game/question/" + this.$route.params.id, {
			params: {
				api_token: Cookies.get("API_TOKEN")
			}
		}).then((res) => {
			if(res.data.result != "FAIL"){
				this.question = res.data.data
			}  
    })
	},
	methods:{
		submitAnswer () {
			this.$http.post("/game/question/answer?api_token=" + Cookies.get("API_TOKEN"), {
				id: this.$route.params.id,
				answer: this.answer
			}).then((res) => {
				if(res.data.result != "FAIL"){
					if(res.data.data.correct){
						alert("Correct!")
						this.$router.push('/game')
					}else{
						alert("Wrong answer!")
					}
				}else{
					alert(res.data.error_message)
					this.$router.push('/game')
				}
			})
		}
	}
}
</script>

<style lang="scss" scoped>
.container{
	display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  width: 100%;
}
.question-page{
	.form{
		margin-top: 1rem;
		.btn{
			margin-top: .5rem;
			width: 100%;
		}
	}
	.back-btn{
		position: fixed;
		top: .5rem;
		left: .5rem;
	}
}
</style>
