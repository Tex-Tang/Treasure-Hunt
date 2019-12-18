<template>
    <body>
        <div class="title">
            <h1>Welcome to Treasure Hunt</h1>
        </div>
        <br>
        <div class="buttons">
            <button class="btn btn-primary btn-lg create-btn" type="text" >
                CREATE A NEW ACCOUNT
            </button>
            <br>
 
            <button class="btn btn-lg login-btn" type="text">
                LOGIN
            </button>
        </div>
    </body>

</template>

<script>
export default {

}
</script>

<style>
body {
    display:flex; 
    flex-direction:column; 
    justify-content:center;
    min-height: 75vh;
}
.title {
    margin-left: auto;
    margin-right: auto;
    width: 75%;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.buttons {
    align-items: center;
    justify-content: center;
    text-align: center;
}

.create-btn {
    margin: auto;
    padding: auto;
    width: 275px;
}

.login-btn {
    padding: auto;
    width: 275px;
}
</style>