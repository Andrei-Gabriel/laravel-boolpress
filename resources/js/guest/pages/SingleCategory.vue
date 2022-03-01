<template>
    <article>
        <h3>{{category.name}}</h3>

        <ul v-if="category && category.posts && category.posts.length > 0">
            <li><strong>Post Associati</strong></li>
            <li v-for="post in category.posts" :key="post.id">
                <router-link :to="{name: 'single-post', params: {slug: post.slug}}">{{post.title}}</router-link>
                <!-- {{post.title}} -->
            </li>
        </ul>
        <h4 v-else>Nessun post associato</h4>
    </article>
</template>

<script>
    export default {
        name: "SingleCategory",
        data() {
            return {
                category: {}
            }
        },
        created() {
            axios.get(`/api/categories/${this.$route.params.slugCat}`)
                .then((response) => {
                    this.category = response.data;
                    console.log(this.category);
                })
                .catch(() => {
                    this.$router.push({name: 'page-404'});
                });
        }
    }
</script>

<style>

</style>