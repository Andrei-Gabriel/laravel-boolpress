<template>
    <article>
        <h3>{{post.title}}</h3>
        <!-- <img :src="`/storage/${post.image}`" :alt="post.title"> -->
    </article>
</template>

<script>
    export default {
        name: "SinglePost",
        data() {
            return {
                post: {}
            }
        },
        created() {
            // localhost:8000/api/posts/{slug}
            axios.get(`/api/posts/${this.$route.params.slug}`)
                .then((response) => {
                    this.post = (response.data);
                }).catch((error) => {
                    // Redirect alla pagina 404
                    this.$router.push({name: "page-404"})
                })
        }
    }
</script>

<style>

</style>