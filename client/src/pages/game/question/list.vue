<template>
    <div class="big-container">
        <div class="container">
            <i class="icon icon-menu" w></i>
            <div class="title">Questions</div>
            <i class="icon icon-location"></i>
        </div>
        <br>
        <div>
            <div class="columns col-lg-auto">
                <button class="btn column col-lg-auto">Question1</button>
                <button class="btn column col-lg-auto">Question2</button>
            </div>
            <div class="columns col-lg-auto">
                <button class="btn column col-lg-auto">Question3</button>
                <button class="btn column col-lg-auto">Question4</button>
            </div>
        </div>
        <br>
        <div class="container bot">
            <div>TeamName</div>
            <div>Score</div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.big-container {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.container {
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: 25px;
}

.flex-container {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.columns {
    align-content: center;
    justify-content: center;
}

.btn {
    width: 50%;
    height: 200px;
}

.bot {
    vertical-align: bottom;
}
</style>>