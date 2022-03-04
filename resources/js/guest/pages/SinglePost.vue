<template>
    <article>
        <h3>{{post.title}}</h3>
        <!-- <img :src="`/storage/${post.image}`" :alt="post.title"> -->
        <div>
            <h3>Lascia un commento</h3>
            <form action="">
                <input type="text" id="name" placeholder="Inserisci un nome" v-model="formData.name">
                <textarea name="content" id="content" rows="10" v-model="formData.content" style="display: block;"></textarea>
                <button type="submit">Aggiungi un commento</button>
            </form>
        </div>
    </article>
</template>

<script>
    export default {
        name: "SinglePost",
        data() {
            return {
                post: {},
                formData: {
                    name: "",
                    content: "",
                }
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