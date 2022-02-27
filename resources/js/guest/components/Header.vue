<template>
    <header>
        <h2>Inizio header</h2>
        <nav>
            <ul>
                <li><a href="/admin/home">Admin area</a></li>
                <li><router-link :to="{ name: 'home' }">Home</router-link></li>
                <li><router-link :to="{ name: 'categories' }">Categorie</router-link></li>
                <li><router-link :to="{ name: 'about' }">Chi siamo</router-link></li>
            </ul>
        </nav>
    </header>
</template>

<script>
    export default {
        name: "Header",
    }
</script>

<style lang="scss" scoped>
    ul {
        display: flex;
        gap: 30px;
        // padding-left: 40px;
    }
</style>