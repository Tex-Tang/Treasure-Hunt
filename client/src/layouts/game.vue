<template>
<div class="game-layout">
	<div class="navbar">
		<div class="d-flex navbar-content">
			<router-link class="btn btn-link" tag="div" to="/game/scoreboard"><i class="icon icon-menu"></i></router-link>
			<router-link class="title" tag="div" to="/game">Questions</router-link>
			<div class="btn btn-link"><i class="icon icon-location"></i></div>
		</div>
	</div>
  <div class="main-content">
    <router-view></router-view>
  </div>
  <div class="ranking-bar" v-if="$route.name == 'Questions'">
		<div class="ranking-bar-content d-flex">
			<div class="team-name">TEAM NAME</div>
			<div class="rank">01</div>
		</div>
	</div>
</div>
</template>

<script>
export default {

}
</script>

<style lang="scss">
.game-layout{
	max-width: 330px;
	margin: 0 auto;
	
	.navbar{
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		.navbar-content{
			height: 2.5rem;
			width: 100%;
			justify-content: space-between;
			align-items: center;
			.btn-link{
				padding: 0 1rem;
				height: auto;
				color: black;
			}
		}
	}
	.ranking-bar{
		position: fixed;
		top: calc(100% - 3.5rem);
		height: 2rem;
		padding: .5rem;
		width: 100%;
		left: 0;
		.ranking-bar-content{
			align-items: center;
			justify-content: space-between;
			border: solid .05rem black;
			border-radius: .2rem;
			.team-name{
				height: 2rem;
				line-height: 2rem;
				font-size: 1rem;
				background-color: black;
				color: white;
				width: 100%;
				font-weight: 800;
				padding-left: .5rem;
			}
			.rank{
				height: 2rem;
				line-height: 2rem;
				font-size: 1rem;
				width: 3rem;
				text-align: center;
			}
		}
	}
}
</style>