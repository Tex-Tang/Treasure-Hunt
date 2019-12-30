<template>
	<div class="questions">
		<div class="columns">
			<router-link to="/game/question/1" tag="div" class="column col-6 question-box" v-for="i in 4" :key="i">
				<div class="title">Question {{i}}</div>
				<div class="content">
					{{Question}}
				</div>
			</router-link>
		</div>
	</div>
</template>

<script>
import Cookies from 'js-cookie'
export default {
	mounted(){
		this.$http.get("/game/questions?api_token", {
			params: {
				api_token: Cookies.get("API_TOKEN")
			}
		}).then(res => (
			this.Question = res
		))
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