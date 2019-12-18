<template>
  <div>
        <div class="container">
            <i class="icon icon-menu col-1" w></i>
            <div class="title col-mx-auto">Questions</div>
            <i class="icon icon-location col-1"></i>
        </div>
        <br>
        <div class="container">
            <form class="form">
                <h1>Question</h1>
                <input type="text" value="answer">
                <button type="submit" class="btn">Submit</button>
            </form>
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

.form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 90%;
}
</style>