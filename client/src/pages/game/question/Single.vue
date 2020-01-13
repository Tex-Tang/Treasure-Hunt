<template>
<div class="container">
  <div class="question-page" :class="{'loading': loading}">
		<router-link to="/game" class="btn btn-link back-btn" tag="a">
			<i class="icon icon-back"></i>
		</router-link>
		<div class="question">
			{{question.content}}
		</div>
		<form class="form" @submit.prevent="submitAnswer">
			<textarea rows="4" class="form-input answer-box" :placeholder="question.hint" type="text" v-model="answer"></textarea>
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
			question: {
				content: "",
				hint: "",
			},
			answer: "",
			loading: true,
		}
	},
	mounted(){
		this.$http.get("/game/question/" + this.$route.params.id, {
			params: {
				api_token: Cookies.get("API_TOKEN")
			}
		}).then((res) => {
			this.loading = false;
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
						this.answer = ""
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
	width: 270px;
	.form{
		margin: 0;
		margin-top: 1rem;
		.btn{
			margin-top: .5rem;
			width: 100%;
		}
		.answer-box{
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
