<template>
  <div>
        <div class="container">
            <i class="icon icon-menu col-1" w></i>
            <div class="title col-mx-auto">Questions</div>
            <i class="icon icon-location col-1"></i>
        </div>
        <br>
        <div>
            <form class="form">
                <div>Question</div>
                <input class="form-input" type="text" value="answer">
                <button class="btn" type="submit">Submit</button>
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
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 25px;
}

.form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 25px;
}

.btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}
</style>