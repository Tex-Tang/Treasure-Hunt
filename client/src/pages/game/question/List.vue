<template>
	<div class="questions loading-lg" :class="{'loading': loading}">
		<div class="columns" v-if="questions.length != 0">
			<router-link :to="'/game/question/' + question.id" tag="div" class="column col-6 question-box" v-for="(question, i) in questions" :key="question.id">
				<div class="title">Question {{i + 1}}</div>
				<div class="content">
					{{question.content}}
				</div>
			</router-link>
		</div>
		<div class="board" v-else>
			<p>Thank you for playing our game.
				<br>
				If you like to create stuff like this, you are welcome to join the computer programming club. Look for us on All Clubs Day.
				<br>
				Thats all, you are dismissed.
			</p>
		</div>
	</div>
</template>

<script>
import axios from 'axios'
import Cookies from 'js-cookie'
export default {
	data(){
		return{
			questions: [],
			loading: true,
		}
	},
	mounted(){
		this.$http.get("/game/questions", {
			params: {
				api_token: Cookies.get("API_TOKEN")
			}
		}).then((res) => {
			this.loading = false
			if(res.data.result != "FAIL"){
				this.questions = res.data.data
			}  
    })
	}
}
</script>

<style lang="scss">

.questions{
	display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  width: 100%;
	.columns{
		margin-bottom: 4rem;
	}
	.question-box{
		height: 7rem;
		border: solid .05rem black;
		border-radius: .2rem;
		padding: 0;
		margin: .2rem;
		width: calc(50% - .4rem);
		.title{
			text-align: center;
			width: 100%;
			background-color: black;
			color: white;
		}
		.content{
			padding: .25rem;
			font-size: .7rem;
			overflow: hidden;
			display: -webkit-box;
			-webkit-line-clamp: 5;
			-webkit-box-orient: vertical;  
			transition: all 200ms;
			height: 5.75rem;
		}
		&:hover{
			.content{
				background-color: black;
				color: white;
			}
		}
	}
}
</style>