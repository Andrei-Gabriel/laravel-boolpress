<template>
    <div>
        <h2>Home Page</h2>
        <Posts/>
    </div>
</template>

<script>
    import Posts from "../components/Posts.vue";
    export default {
        name: "Home",
        components: {
            Posts,
        }
    }  
</script>

<style lang="scss" scoped>
    h2 {
        color: red;
    }
</style>