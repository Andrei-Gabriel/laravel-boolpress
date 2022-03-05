<template>
    <article>
        <h3>{{post.title}}</h3>
        <!-- <img :src="`/storage/${post.image}`" :alt="post.title"> -->
        <div>
            <h3>Lascia un commento</h3>
            <form action="" @submit.prevent="addComment()">
                <input type="text" id="name" placeholder="Inserisci un nome" v-model="formData.name">
                <textarea name="content" id="content" rows="10" v-model="formData.content" style="display: block;"></textarea>
                <div v-if="formErrors.content" style="background-color: red; color: white;">
                    <ul>
                        <li v-for="(error, index) in formErrors.content" :key="index">
                            {{error}}
                        </li>
                    </ul>
                </div>
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
                    post_id: null,
                },
                formErrors: {}
            }
        },
        methods: {
            addComment() {
                // api/comments
                axios.post(`/api/comments`, this.formData).then((response) => {
                        this.formData.name = "";
                        this.formData.content = "";
                        alert("Commento in fase di approvazione");
                    }).catch((error) => {
                    // Handle error
                    this.formErrors = error.response.data.errors;
                })
            }
        },
        created() {
            // localhost:8000/api/posts/{slug}
            axios.get(`/api/posts/${this.$route.params.slug}`)
                .then((response) => {
                    this.post = response.data;
                    this.formData.post_id = this.post.id;
                }).catch((error) => {
                    // Redirect alla pagina 404
                    this.$router.push({name: "page-404"})
                })
        }
    }
</script>

<style>

</style>