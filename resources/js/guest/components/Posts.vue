<template>
    <section>
        <h3>Lista posts</h3>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <span>
                    <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">{{post.title}}</router-link>
                </span><br>
                <span v-if="post.category">Categoria: {{post.category.name}}</span>
                <div v-if="post.tags.length > 0">
                    <span>Tags:</span>
                    <ul>
                        <li v-for="tag in post.tags" :kay="tag.id">{{tag.name}}</li>
                    </ul>
                </div>
            </li>
        </ul>
    </section>
</template>

<script>
    export default {
        name: "Posts",
        data() {
            return {
                posts: []
            }
        },
        created() {
            axios.get("/api/posts")
                .then( (response) => {
                    this.posts = response.data;
                });
        }
    }
</script>

<style>

</style>