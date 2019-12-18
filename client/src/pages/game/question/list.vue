<template>
    <div>
        <div class="container">
            <i class="icon icon-menu col-1" w></i>
            <div class="title col-mx-auto">Questions</div>
            <i class="icon icon-location col-1"></i>
        </div>
        <br>
        <div class="list">
            <div class="flex-container">
                <button class="btn">Question1</button>
                <button class="btn">Question2</button>
            </div>
            <div class="flex-container">
                <button class="btn">Question3</button>
                <button class="btn">Question4</button>
            </div>
        </div>
        <br>
        <div class="score">
            <h1>TeamName</h1>
            <h1>Score</h1>
        </div>
    </div>
    
    
</template>

<script>
export default {

}
</script>

<style scoped>
.container {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

.flex-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.left {
    justify-content: left;
    align-items: center;
}

.title {
    justify-content: center;
    align-items: center;
}

.right {
    justify-content: right;
    align-items: center;
}

.list {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center
}

.btn {
    width: 200px;
    height: 200px;
}
</style>>