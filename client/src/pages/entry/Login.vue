<template>
    <body>
        <div class="back-btn">
            <button class="btn">
                <i class="icon icon-arrow-left"></i>
            </button>
        </div>
        <div>
            <h2>Login</h2>
            <form>
                <input type="text" value="Group Name">
                <br>
                <input type="text" value="Password">
            </form> 
        </div>
    </body>
</template>

<script>
export default {
    data: () => ({
        data: {
            groupName: "",
            password: ""
        }
    })
}
</script>

<style scoped>

</style>