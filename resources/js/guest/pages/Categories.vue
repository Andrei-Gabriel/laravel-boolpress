<template>
    <section>
        <h2>Categorie</h2>
        <ul>
            <li v-for="category in categories" :key="category.id">
                <router-link :to="{ name: 'single-category', params: { slugCat: category.slugCat } }">{{category.name}}</router-link>
            </li>
        </ul>
    </section>
</template>

<script>
    export default {
        name: "categories",
        data() {
            return {
                categories: []
            }
        },
        created() {
            axios.get("/api/categories")
                .then((response) => {
                    this.categories = response.data;
                })
        }
    }
</script>

<style>

</style>