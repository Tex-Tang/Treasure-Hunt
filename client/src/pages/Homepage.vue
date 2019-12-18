<template>
    <div class="homepage">
        <div class="container">
            <div class="title">
                <h1>Welcome to Treasure Hunt</h1>
            </div>
            <router-link to="/register" class="btn btn-primary btn-lg create-btn mb-2" tag="div">
                CREATE A NEW ACCOUNT
            </router-link>
            <router-link to="/login" class="btn btn-lg login-btn" tag="div">
                LOGIN
            </router-link>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss">
.homepage{
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    .container{
        display: flex;
        flex-direction: column; 
        text-align: center;
        margin-bottom: 3rem;
        padding-left: .5rem;
        padding-right: .5rem;
    }
}
</style>