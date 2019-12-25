<template>
<div class="container">
  <div class="question-page">
		<router-link to="/game" class="btn btn-link back-btn" tag="a">
			<i class="icon icon-back"></i>
		</router-link>
		<div class="question">
			At the Puan Sri Datin Mae Cheng Basketball Court, Basketball, Volleyball and what else is allowed?
		</div>
		<form class="form">
			<input class="form-input" type="text" placeholder="Answer">
			<div class="btn btn-primary">Submit</div>
		</form>
	</div>
</div>
</template>

<script>
export default {
	mounted(){
		console.log(this.$route)
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
		top: 4rem;
		left: 1.2rem;
	}
}
</style>
